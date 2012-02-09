<?php

	/**
	 * <p>This control is used to display a simple html table.
	 *
	 * <p>The control itself will display things based off of an array of objects that gets set as the "Data Source".
	 * It is particularly useful when combined with the Class::LoadArrayByXXX() functions or the Class::LoadAll()
	 * that is generated by the CodeGen framework, or when combined with custom Class ArrayLoaders that you define
	 * youself, but who's structure is based off of the CodeGen framework.</p>
	 *
	 * <p>For each item in a datasource's Array, a row (&lt;tr&gt;) will be generated.
	 * You can define any number of QSimpleTableColumns which will result in a &lt;td&gt; for each row.
	 * Using the QSimpleTableColumn's Accessor property, you can specify how the data for each cell should be
	 * fetched from the datasource.</p>
	 *
	 * <p><i>NOTE</i>: Unlike QDataGrid, this class does not use eval() for evaluating the cell values. Instead, a variety of
	 * methods can be used to fetch the data for cells, including callable objects such as
	 * closures (introduced in PHP 5,3).</p>
	 *
	 * @package Controls
	 *
	 * @property string $RowCssClass
	 * @property string $AlternateRowCssClass
	 * @property string $HeaderRowCssClass
	 * @property boolean $ShowHeader
	 * @property boolean $ShowFooter
	 * @throws QCallerException
	 *
	 */
	abstract class QSimpleTableBase extends QPaginatedControl {
		/** @var QAbstractSimpleTableColumn[] */
		protected $objColumnArray;

		protected $strRowCssClass = null;
		protected $strAlternateRowCssClass = null;
		protected $strHeaderRowCssClass = null;
		protected $blnShowHeader = true;
		protected $blnShowFooter = false;

		public function __construct($objParentObject, $strControlId = null)	{
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException  $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		public function ParsePostData() { }

		public function CreateIndexedColumn($strName = '', $mixIndex = null) {
			if (is_null($mixIndex)) {
				$mixIndex = count($this->objColumnArray);
			}
			$objColumn = new QSimpleTableIndexedColumn($strName, $mixIndex);
			$this->AddColumn($objColumn);
			return $objColumn;
		}

		public function CreatePropertyColumn($strName, $strProperty) {
			$objColumn = new QSimpleTablePropertyColumn($strName, $strProperty);
			$this->AddColumn($objColumn);
			return $objColumn;
		}

		public function CreateClosureColumn($strName, $objClosure) {
			$objColumn = new QSimpleTableClosureColumn($strName, $objClosure);
			$this->AddColumn($objColumn);
			return $objColumn;
		}

		// Used to add a SimpleTableColumn to this SimpleTable
		public function AddColumn(QAbstractSimpleTableColumn $objColumn) {
			$this->blnModified = true;
			$this->objColumnArray[] = $objColumn;
		}

		public function AddColumnAt($intColumnIndex, QAbstractSimpleTableColumn $objColumn) {
			$this->blnModified = true;
			try {
				$intColumnIndex = QType::Cast($intColumnIndex, QType::Integer);
			} catch (QInvalidCastException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			if ($intColumnIndex < 0 || $intColumnIndex > count($this->objColumnArray)) {
				throw new QIndexOutOfRangeException($intColumnIndex, "AddColumnAt()");
			}

			if ($intColumnIndex == 0) {
				$this->objColumnArray = array_merge(array($objColumn), $this->objColumnArray);
			} else {
				$this->objColumnArray = array_merge(array_slice($this->objColumnArray, 0, $intColumnIndex),
													array($objColumn),
													array_slice($this->objColumnArray, $intColumnIndex));
			}
		}

		public function RemoveColumn($intColumnIndex) {
			$this->blnModified = true;
			try {
				$intColumnIndex = QType::Cast($intColumnIndex, QType::Integer);
			} catch (QInvalidCastException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			if ($intColumnIndex < 0 || $intColumnIndex > count($this->objColumnArray)) {
				throw new QIndexOutOfRangeException($intColumnIndex, "RemoveColumn()");
			}

			array_splice($this->objColumnArray, $intColumnIndex, 1);
		}

		public function RemoveColumnByName($strName) {
			$this->blnModified = true;
			for ($intIndex = 0; $intIndex < count($this->objColumnArray); $intIndex++) {
				if ($this->objColumnArray[$intIndex]->Name == $strName) {
					array_splice($this->objColumnArray, $intIndex, 1);
					return;
				}
			}
		}

		public function RemoveColumnsByName($strName) {
			$this->blnModified = true;
			for ($intIndex = 0; $intIndex < count($this->objColumnArray); $intIndex++) {
				if ($this->objColumnArray[$intIndex]->Name == $strName) {
					array_splice($this->objColumnArray, $intIndex, 1);
					$intIndex--;
				}
			}
		}

		public function RemoveAllColumns() {
			$this->blnModified = true;
			$this->objColumnArray = array();
		}

		/**
		 * @return QAbstractSimpleTableColumn[]
		 */
		public function GetAllColumns() {
			return $this->objColumnArray;
		}

		public function GetColumn($intColumnIndex) {
			if (array_key_exists($intColumnIndex, $this->objColumnArray))
				return $this->objColumnArray[$intColumnIndex];
			return null;
		}

		public function GetColumnByName($strName) {
			if ($this->objColumnArray) foreach ($this->objColumnArray as $objColumn)
				if ($objColumn->Name == $strName)
					return $objColumn;
			return null;
		}

		public function GetColumnsByName($strName) {
			$objColumnArrayToReturn = array();
			if ($this->objColumnArray) foreach ($this->objColumnArray as $objColumn)
				if ($objColumn->Name == $strName)
					array_push($objColumnArrayToReturn, $objColumn);
			return $objColumnArrayToReturn;
		}

		protected function GetHeaderRowHtml() {
			$strToReturn = $this->strHeaderRowCssClass ? '<tr class="' . $this->strHeaderRowCssClass . '">' : '<tr>';
			if ($this->objColumnArray) foreach ($this->objColumnArray as $objColumn) {
				$strToReturn .= $objColumn->RenderHeaderCell();
			}
			$strToReturn .= "  </tr>\r\n";

			return $strToReturn;
		}

		protected function GetDataGridRowHtml($objObject, $intCurrentRowIndex) {
			if (($intCurrentRowIndex % 2) == 1 && $this->strAlternateRowCssClass) {
				$strToReturn = '<tr class="' . $this->strAlternateRowCssClass . '">';
			} else if ($this->strRowCssClass) {
				$strToReturn = '<tr class="' . $this->strRowCssClass . '">';
			} else {
				$strToReturn = '<tr>';
			}

			foreach ($this->objColumnArray as $objColumn) {
				try {
					$strToReturn .= $objColumn->RenderCell($objObject);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
			}
			$strToReturn .= '</tr>';
			return $strToReturn;
		}

		protected function GetFooterRowHtml() { }

		protected function GetControlHtml() {
			$this->DataBind();

			// Table Tag
			$strStyle = $this->GetStyleAttributes();
			if ($strStyle)
				$strStyle = sprintf('style="%s" ', $strStyle);
			$strToReturn = sprintf("<table id=\"%s\" %s%s>\n", $this->strControlId, $this->GetAttributes(), $strStyle);

			// Header Row (if applicable)
			if ($this->blnShowHeader)
				$strToReturn .= "<thead>\n" . $this->GetHeaderRowHtml() . "</thead>\n";

			// Footer Row (if applicable)
			if ($this->blnShowFooter)
				$strToReturn .= "<tfoot>\n" . $this->GetFooterRowHtml() . "</tfoot>\n";

			// DataGrid Rows
			$strToReturn .= "<tbody>\n";
			$intCurrentRowIndex = 0;
			if ($this->objDataSource) {
				foreach ($this->objDataSource as $objObject) {
					$strToReturn .= $this->GetDataGridRowHtml($objObject, $intCurrentRowIndex);
					$intCurrentRowIndex++;
				}
			}
			$strToReturn .= "</tbody>\r\n";

			// Finish Up
			$strToReturn .= '</table>';
			$this->objDataSource = null;
			return $strToReturn;
		}

		public function __get($strName) {
			switch ($strName) {
				case 'RowCssClass':
					return $this->strRowCssClass;
				case 'AlternateRowCssClass':
					return $this->strAlternateRowCssClass;
				case 'HeaderRowCssClass':
					return $this->strHeaderRowCssClass;
				case 'ShowHeader':
					return $this->blnShowHeader;
				case 'ShowFooter':
					return $this->blnShowFooter;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case "RowCssClass":
					try {
						$this->strRowCssClass = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "AlternateRowCssClass":
					try {
						$this->strAlternateRowCssClass = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "HeaderRowCssClass":
					try {
						$this->strHeaderRowCssClass = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "ShowHeader":
					try {
						$this->blnShowHeader = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "ShowFooter":
					try {
						$this->blnShowFooter = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						parent::__set($strName, $mixValue);
						break;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

	}

?>