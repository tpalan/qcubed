<?php
	/**
	 * QResizableGen File
	 * 
	 * The abstract QResizableGen class defined here is
	 * code-generated and contains options, events and methods scraped from the
	 * JQuery UI documentation Web site. It is not generated by the typical
	 * codegen process, but rather is generated periodically by the core QCubed
	 * team and checked in. However, the code to generate this file is
	 * in the assets/_core/php/_devetools/jquery_ui_gen/jq_control_gen.php file
	 * and you can regenerate the files if you need to.
	 *
	 * The comments in this file are taken from the JQuery UI site, so they do
	 * not always make sense with regard to QCubed. They are simply provided
	 * as reference. Note that this is very low-level code, and does not always
	 * update QCubed state variables. See the QResizableBase 
	 * file, which contains code to interface between this generated file and QCubed.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the QResizable class file.
	 *
	 */

	/* Custom event classes for this control */
	
	
	/**
	 * Triggered when the resizable is created.<ul><li><strong>event</strong>
	 * 		Type: <a>Event</a> </li> <li><strong>ui</strong> Type: <a>Object</a>
	 * 		</li></ul><p><em>Note: The <code>ui</code> object is empty but included for
	 * 		consistency with other events.</em></p>
	 */
	class QResizable_CreateEvent extends QJqUiEvent {
		const EventName = 'resizecreate';
	}
	/**
	 * This event is triggered during the resize, on the drag of the resize
	 * 		handler.<ul><li><strong>event</strong> Type: <a>Event</a> </li>
	 * 		<li><strong>ui</strong> Type: <a>Object</a> 
	 * 		<ul><li><strong>element</strong> Type: <a>jQuery</a> The jQuery object
	 * 		representing the element to be resized</li> <li><strong>helper</strong>
	 * 		Type: <a>jQuery</a> The jQuery object representing the helper that's being
	 * 		resized</li> <li><strong>originalElement</strong> Type: <a>jQuery</a> The
	 * 		jQuery object representing the original element before it is wrapped</li>
	 * 		<li><strong>originalPosition</strong> Type: <a>Object</a> The position
	 * 		represented as <code>{ left, top }</code> before the resizable is
	 * 		resized</li> <li><strong>originalSize</strong> Type: <a>Object</a> The size
	 * 		represented as <code>{ width, height }</code> before the resizable is
	 * 		resized</li> <li><strong>position</strong> Type: <a>Object</a> The current
	 * 		position represented as <code>{ left, top }</code></li>
	 * 		<li><strong>size</strong> Type: <a>Object</a> The current size represented
	 * 		as <code>{ width, height }</code></li></ul></li></ul>
	 */
	class QResizable_ResizeEvent extends QJqUiEvent {
		const EventName = 'resize';
	}
	/**
	 * This event is triggered at the start of a resize
	 * 		operation.<ul><li><strong>event</strong> Type: <a>Event</a> </li>
	 * 		<li><strong>ui</strong> Type: <a>Object</a> 
	 * 		<ul><li><strong>element</strong> Type: <a>jQuery</a> The jQuery object
	 * 		representing the element to be resized</li> <li><strong>helper</strong>
	 * 		Type: <a>jQuery</a> The jQuery object representing the helper that's being
	 * 		resized</li> <li><strong>originalElement</strong> Type: <a>jQuery</a> The
	 * 		jQuery object representing the original element before it is wrapped</li>
	 * 		<li><strong>originalPosition</strong> Type: <a>Object</a> The position
	 * 		represented as <code>{ left, top }</code> before the resizable is
	 * 		resized</li> <li><strong>originalSize</strong> Type: <a>Object</a> The size
	 * 		represented as <code>{ width, height }</code> before the resizable is
	 * 		resized</li> <li><strong>position</strong> Type: <a>Object</a> The current
	 * 		position represented as <code>{ left, top }</code></li>
	 * 		<li><strong>size</strong> Type: <a>Object</a> The current size represented
	 * 		as <code>{ width, height }</code></li></ul></li></ul>
	 */
	class QResizable_StartEvent extends QJqUiEvent {
		const EventName = 'resizestart';
	}
	/**
	 * This event is triggered at the end of a resize
	 * 		operation.<ul><li><strong>event</strong> Type: <a>Event</a> </li>
	 * 		<li><strong>ui</strong> Type: <a>Object</a> 
	 * 		<ul><li><strong>element</strong> Type: <a>jQuery</a> The jQuery object
	 * 		representing the element to be resized</li> <li><strong>helper</strong>
	 * 		Type: <a>jQuery</a> The jQuery object representing the helper that's being
	 * 		resized</li> <li><strong>originalElement</strong> Type: <a>jQuery</a> The
	 * 		jQuery object representing the original element before it is wrapped</li>
	 * 		<li><strong>originalPosition</strong> Type: <a>Object</a> The position
	 * 		represented as <code>{ left, top }</code> before the resizable is
	 * 		resized</li> <li><strong>originalSize</strong> Type: <a>Object</a> The size
	 * 		represented as <code>{ width, height }</code> before the resizable is
	 * 		resized</li> <li><strong>position</strong> Type: <a>Object</a> The current
	 * 		position represented as <code>{ left, top }</code></li>
	 * 		<li><strong>size</strong> Type: <a>Object</a> The current size represented
	 * 		as <code>{ width, height }</code></li></ul></li></ul>
	 */
	class QResizable_StopEvent extends QJqUiEvent {
		const EventName = 'resizestop';
	}

	/* Custom "property" event classes for this control */

	/**
	 * Generated QResizableGen class.
	 * 
	 * This is the QResizableGen class which is automatically generated
	 * by scraping the JQuery UI documentation website. As such, it includes all the options
	 * as listed by the JQuery UI website, which may or may not be appropriate for QCubed. See
	 * the QResizableBase class for any glue code to make this class more
	 * usable in QCubed.
	 * 
	 * @see QResizableBase
	 * @package Controls\Base
	 * @property mixed $AlsoResize One or more elements to resize synchronously with the resizable element.
	 * @property boolean $Animate Animates to the final size after resizing.
	 * @property mixed $AnimateDuration How long to animate when using the <a><code>animate</code></a>
	 * 		option.<strong>Multiple types
	 * 		supported:</strong><ul><li><strong>Number</strong>: Duration in
	 * 		milliseconds.</li> <li><strong>String</strong>: A named duration, such as
	 * 		<code>"slow"</code> or <code>"fast"</code>.</li></ul>
	 * @property string $AnimateEasing Which <a>easing</a> to apply when using the <a><code>animate</code></a>
	 * 		option.
	 * @property mixed $AspectRatio Whether the element should be constrained to a specific aspect
	 * 		ratio.<strong>Multiple types
	 * 		supported:</strong><ul><li><strong>Boolean</strong>: When set to
	 * 		<code>true</code>, the element will maintain its original aspect
	 * 		ratio.</li> <li><strong>Number</strong>: Force the element to maintain a
	 * 		specific aspect ratio during resizing.</li></ul>
	 * @property boolean $AutoHide Whether the handles should hide when the user is not hovering over the
	 * 		element.
	 * @property mixed $Cancel Prevents resizing from starting on specified elements.
	 * @property mixed $Containment Constrains resizing to within the bounds of the specified element or
	 * 		region.<strong>Multiple types
	 * 		supported:</strong><ul><li><strong>Selector</strong>: The resizable element
	 * 		will be contained to the bounding box of the first element found by the
	 * 		selector. If no element is found, no containment will be set.</li>
	 * 		<li><strong>Element</strong>: The resizable element will be contained to
	 * 		the bounding box of this element.</li> <li><strong>String</strong>:
	 * 		Possible values: <code>"parent"</code> and
	 * 		<code>"document"</code>.</li></ul>
	 * @property integer $Delay Tolerance, in milliseconds, for when resizing should start. If specified,
	 * 		resizing will not start until after mouse is moved beyond duration. This
	 * 		can help prevent unintended resizing when clicking on an element.
	 * @property boolean $Disabled Disables the resizable if set to <code>true</code>.
	 * @property integer $Distance Tolerance, in pixels, for when resizing should start. If specified,
	 * 		resizing will not start until after mouse is moved beyond distance. This
	 * 		can help prevent unintended resizing when clicking on an element.
	 * @property boolean $Ghost If set to <code>true</code>, a semi-transparent helper element is shown for
	 * 		resizing.
	 * @property array $Grid Snaps the resizing element to a grid, every x and y pixels. Array values:
	 * 		<code>[ x, y ]</code>.
	 * @property mixed $Handles Which handles can be used for resizing.<strong>Multiple types
	 * 		supported:</strong><ul><li><strong>String</strong>: A comma delimited list
	 * 		of any of the following: n, e, s, w, ne, se, sw, nw, all. The necessary
	 * 		handles will be auto-generated by the plugin.</li>
	 * 		<li><strong>Object</strong>:  					<p>The following keys are supported: {
	 * 		n, e, s, w, ne, se, sw, nw }. The value of any specified should be a jQuery
	 * 		selector matching the child element of the resizable to use as that handle.
	 * 		If the handle is not a child of the resizable, you can pass in the
	 * 		DOMElement or a valid jQuery object directly.</p> 					<p><em>Note: When
	 * 		generating your own handles, each handle must have the
	 * 		<code>ui-resizable-handle</code> class, as well as the appropriate
	 * 		<code>ui-resizable-{direction}</code> class, .e.g.,
	 * 		<code>ui-resizable-s</code>.</em></p></li></ul>
	 * @property string $Helper A class name that will be added to a proxy element to outline the resize
	 * 		during the drag of the resize handle. Once the resize is complete, the
	 * 		original element is sized.
	 * @property integer $MaxHeight The maximum height the resizable should be allowed to resize to.
	 * @property integer $MaxWidth The maximum width the resizable should be allowed to resize to.
	 * @property integer $MinHeight The minimum height the resizable should be allowed to resize to.
	 * @property integer $MinWidth The minimum width the resizable should be allowed to resize to.
	 */

	abstract class QResizableGen extends QControl	{
		protected $strJavaScripts = __JQUERY_EFFECTS__;
		protected $strStyleSheets = __JQUERY_CSS__;
		/** @var mixed */
		protected $mixAlsoResize = null;
		/** @var boolean */
		protected $blnAnimate = null;
		/** @var mixed */
		protected $mixAnimateDuration = null;
		/** @var string */
		protected $strAnimateEasing = null;
		/** @var mixed */
		protected $mixAspectRatio = null;
		/** @var boolean */
		protected $blnAutoHide = null;
		/** @var mixed */
		protected $mixCancel = null;
		/** @var mixed */
		protected $mixContainment = null;
		/** @var integer */
		protected $intDelay;
		/** @var boolean */
		protected $blnDisabled = null;
		/** @var integer */
		protected $intDistance = null;
		/** @var boolean */
		protected $blnGhost = null;
		/** @var array */
		protected $arrGrid = null;
		/** @var mixed */
		protected $mixHandles = null;
		/** @var string */
		protected $strHelper = null;
		/** @var integer */
		protected $intMaxHeight = null;
		/** @var integer */
		protected $intMaxWidth = null;
		/** @var integer */
		protected $intMinHeight = null;
		/** @var integer */
		protected $intMinWidth = null;
		
		protected function makeJsProperty($strProp, $strKey) {
			$objValue = $this->$strProp;
			if (null === $objValue) {
				return '';
			}

			return $strKey . ': ' . JavaScriptHelper::toJsObject($objValue) . ', ';
		}

		protected function makeJqOptions() {
			$strJqOptions = '';
			$strJqOptions .= $this->makeJsProperty('AlsoResize', 'alsoResize');
			$strJqOptions .= $this->makeJsProperty('Animate', 'animate');
			$strJqOptions .= $this->makeJsProperty('AnimateDuration', 'animateDuration');
			$strJqOptions .= $this->makeJsProperty('AnimateEasing', 'animateEasing');
			$strJqOptions .= $this->makeJsProperty('AspectRatio', 'aspectRatio');
			$strJqOptions .= $this->makeJsProperty('AutoHide', 'autoHide');
			$strJqOptions .= $this->makeJsProperty('Cancel', 'cancel');
			$strJqOptions .= $this->makeJsProperty('Containment', 'containment');
			$strJqOptions .= $this->makeJsProperty('Delay', 'delay');
			$strJqOptions .= $this->makeJsProperty('Disabled', 'disabled');
			$strJqOptions .= $this->makeJsProperty('Distance', 'distance');
			$strJqOptions .= $this->makeJsProperty('Ghost', 'ghost');
			$strJqOptions .= $this->makeJsProperty('Grid', 'grid');
			$strJqOptions .= $this->makeJsProperty('Handles', 'handles');
			$strJqOptions .= $this->makeJsProperty('Helper', 'helper');
			$strJqOptions .= $this->makeJsProperty('MaxHeight', 'maxHeight');
			$strJqOptions .= $this->makeJsProperty('MaxWidth', 'maxWidth');
			$strJqOptions .= $this->makeJsProperty('MinHeight', 'minHeight');
			$strJqOptions .= $this->makeJsProperty('MinWidth', 'minWidth');
			if ($strJqOptions) $strJqOptions = substr($strJqOptions, 0, -2);
			return $strJqOptions;
		}

		public function getJqSetupFunction() {
			return 'resizable';
		}

		public function GetControlJavaScript() {
			return sprintf('jQuery("#%s").%s({%s})', $this->getJqControlId(), $this->getJqSetupFunction(), $this->makeJqOptions());
		}

		public function GetEndScript() {
			$str = '';
			if ($this->getJqControlId() !== $this->ControlId) {
				// #845: if the element receiving the jQuery UI events is different than this control
				// we need to clean-up the previously attached event handlers, so that they are not duplicated 
				// during the next ajax update which replaces this control.
				$str = sprintf('jQuery("#%s").off(); ', $this->getJqControlId());
			}
			$str .= $this->GetControlJavaScript();
			if ($strParentScript = parent::GetEndScript()) {
				$str .= '; ' . $strParentScript;
			}
			return $str;
		}
		
		/**
		 * Call a JQuery UI Method on the object. 
		 * 
		 * A helper function to call a jQuery UI Method. Takes variable number of arguments.
		 *
		 * @param boolean $blnAttribute true if the method is modifying an option, false if executing a command
		 * @param string $strMethodName the method name to call
		 * @internal param $mixed [optional] $mixParam1
		 * @internal param $mixed [optional] $mixParam2
		 */
		protected function CallJqUiMethod($blnAttribute, $strMethodName /*, ... */) {
			$args = func_get_args();
			array_shift ($args);

			$strArgs = JavaScriptHelper::toJsObject($args);
			$strJs = sprintf('jQuery("#%s").%s(%s)',
				$this->getJqControlId(),
				$this->getJqSetupFunction(),
				substr($strArgs, 1, strlen($strArgs)-2));	// params without brackets
			if ($blnAttribute) {
				$this->AddAttributeScript($strJs);
			} else {
				QApplication::ExecuteJavaScript($strJs);
			}
		}


		/**
		 * Removes the resizable functionality completely. This will return the
		 * element back to its pre-init state.<ul><li>This method does not accept any
		 * arguments.</li></ul>
		 */
		public function Destroy() {
			$this->CallJqUiMethod(false, "destroy");
		}
		/**
		 * Disables the resizable.<ul><li>This method does not accept any
		 * arguments.</li></ul>
		 */
		public function Disable() {
			$this->CallJqUiMethod(false, "disable");
		}
		/**
		 * Enables the resizable.<ul><li>This method does not accept any
		 * arguments.</li></ul>
		 */
		public function Enable() {
			$this->CallJqUiMethod(false, "enable");
		}
		/**
		 * <p>Retrieves the resizable's instance object. If the element does not have
		 * an associated instance, <code>undefined</code> is returned.</p> 
		 * 		<p>Unlike other widget methods, <code>instance()</code> is safe to call
		 * on any element after the resizable plugin has loaded.</p><ul><li>This
		 * method does not accept any arguments.</li></ul>
		 */
		public function Instance() {
			$this->CallJqUiMethod(false, "instance");
		}
		/**
		 * Gets the value currently associated with the specified
		 * <code>optionName</code>.<ul><li><strong>optionName</strong> Type:
		 * <a>String</a> The name of the option to get.</li></ul>
		 * @param $optionName
		 */
		public function Option($optionName) {
			$this->CallJqUiMethod(false, "option", $optionName);
		}
		/**
		 * Gets an object containing key/value pairs representing the current
		 * resizable options hash.<ul><li>This signature does not accept any
		 * arguments.</li></ul>
		 */
		public function Option1() {
			$this->CallJqUiMethod(false, "option");
		}
		/**
		 * Sets the value of the resizable option associated with the specified
		 * <code>optionName</code>.<ul><li><strong>optionName</strong> Type:
		 * <a>String</a> The name of the option to set.</li>
		 * <li><strong>value</strong> Type: <a>Object</a> A value to set for the
		 * option.</li></ul>
		 * @param $optionName
		 * @param $value
		 */
		public function Option2($optionName, $value) {
			$this->CallJqUiMethod(false, "option", $optionName, $value);
		}
		/**
		 * Sets one or more options for the resizable.<ul><li><strong>options</strong>
		 * Type: <a>Object</a> A map of option-value pairs to set.</li></ul>
		 * @param $options
		 */
		public function Option3($options) {
			$this->CallJqUiMethod(false, "option", $options);
		}


		public function __get($strName) {
			switch ($strName) {
				case 'AlsoResize': return $this->mixAlsoResize;
				case 'Animate': return $this->blnAnimate;
				case 'AnimateDuration': return $this->mixAnimateDuration;
				case 'AnimateEasing': return $this->strAnimateEasing;
				case 'AspectRatio': return $this->mixAspectRatio;
				case 'AutoHide': return $this->blnAutoHide;
				case 'Cancel': return $this->mixCancel;
				case 'Containment': return $this->mixContainment;
				case 'Delay': return $this->intDelay;
				case 'Disabled': return $this->blnDisabled;
				case 'Distance': return $this->intDistance;
				case 'Ghost': return $this->blnGhost;
				case 'Grid': return $this->arrGrid;
				case 'Handles': return $this->mixHandles;
				case 'Helper': return $this->strHelper;
				case 'MaxHeight': return $this->intMaxHeight;
				case 'MaxWidth': return $this->intMaxWidth;
				case 'MinHeight': return $this->intMinHeight;
				case 'MinWidth': return $this->intMinWidth;
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
				case 'AlsoResize':
					$this->mixAlsoResize = $mixValue;
				
					if ($this->OnPage) {
						$this->CallJqUiMethod(true, 'option', 'alsoResize', $mixValue);
					}
					break;

				case 'Animate':
					try {
						$this->blnAnimate = QType::Cast($mixValue, QType::Boolean);
						if ($this->OnPage) {
							$this->CallJqUiMethod(true, 'option', 'animate', $this->blnAnimate);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AnimateDuration':
					$this->mixAnimateDuration = $mixValue;
				
					if ($this->OnPage) {
						$this->CallJqUiMethod(true, 'option', 'animateDuration', $mixValue);
					}
					break;

				case 'AnimateEasing':
					try {
						$this->strAnimateEasing = QType::Cast($mixValue, QType::String);
						if ($this->OnPage) {
							$this->CallJqUiMethod(true, 'option', 'animateEasing', $this->strAnimateEasing);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AspectRatio':
					$this->mixAspectRatio = $mixValue;
				
					if ($this->OnPage) {
						$this->CallJqUiMethod(true, 'option', 'aspectRatio', $mixValue);
					}
					break;

				case 'AutoHide':
					try {
						$this->blnAutoHide = QType::Cast($mixValue, QType::Boolean);
						if ($this->OnPage) {
							$this->CallJqUiMethod(true, 'option', 'autoHide', $this->blnAutoHide);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cancel':
					$this->mixCancel = $mixValue;
				
					if ($this->OnPage) {
						$this->CallJqUiMethod(true, 'option', 'cancel', $mixValue);
					}
					break;

				case 'Containment':
					$this->mixContainment = $mixValue;
				
					if ($this->OnPage) {
						$this->CallJqUiMethod(true, 'option', 'containment', $mixValue);
					}
					break;

				case 'Delay':
					try {
						$this->intDelay = QType::Cast($mixValue, QType::Integer);
						if ($this->OnPage) {
							$this->CallJqUiMethod(true, 'option', 'delay', $this->intDelay);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Disabled':
					try {
						$this->blnDisabled = QType::Cast($mixValue, QType::Boolean);
						if ($this->OnPage) {
							$this->CallJqUiMethod(true, 'option', 'disabled', $this->blnDisabled);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Distance':
					try {
						$this->intDistance = QType::Cast($mixValue, QType::Integer);
						if ($this->OnPage) {
							$this->CallJqUiMethod(true, 'option', 'distance', $this->intDistance);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ghost':
					try {
						$this->blnGhost = QType::Cast($mixValue, QType::Boolean);
						if ($this->OnPage) {
							$this->CallJqUiMethod(true, 'option', 'ghost', $this->blnGhost);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Grid':
					try {
						$this->arrGrid = QType::Cast($mixValue, QType::ArrayType);
						if ($this->OnPage) {
							$this->CallJqUiMethod(true, 'option', 'grid', $this->arrGrid);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Handles':
					$this->mixHandles = $mixValue;
				
					if ($this->OnPage) {
						$this->CallJqUiMethod(true, 'option', 'handles', $mixValue);
					}
					break;

				case 'Helper':
					try {
						$this->strHelper = QType::Cast($mixValue, QType::String);
						if ($this->OnPage) {
							$this->CallJqUiMethod(true, 'option', 'helper', $this->strHelper);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MaxHeight':
					try {
						$this->intMaxHeight = QType::Cast($mixValue, QType::Integer);
						if ($this->OnPage) {
							$this->CallJqUiMethod(true, 'option', 'maxHeight', $this->intMaxHeight);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MaxWidth':
					try {
						$this->intMaxWidth = QType::Cast($mixValue, QType::Integer);
						if ($this->OnPage) {
							$this->CallJqUiMethod(true, 'option', 'maxWidth', $this->intMaxWidth);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MinHeight':
					try {
						$this->intMinHeight = QType::Cast($mixValue, QType::Integer);
						if ($this->OnPage) {
							$this->CallJqUiMethod(true, 'option', 'minHeight', $this->intMinHeight);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MinWidth':
					try {
						$this->intMinWidth = QType::Cast($mixValue, QType::Integer);
						if ($this->OnPage) {
							$this->CallJqUiMethod(true, 'option', 'minWidth', $this->intMinWidth);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				case 'Enabled':
					$this->Disabled = !$mixValue;	// Tie in standard QCubed functionality
					parent::__set($strName, $mixValue);
					break;
					
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
