<?php

abstract class QPluginUninstaller extends QPluginInstallerBase {
	public static function uninstallExisting($strPluginName) {
		$blnMasterConfigUpdated 	= self::deleteFromMasterConfig($strPluginName);
		$blnIncludesFileUpdated 	= self::removeMarkedSectionHelper($strPluginName, self::getMasterIncludeFilePath());
		$blnExamplesConfigUpdated 	= self::removeMarkedSectionHelper($strPluginName, self::getMasterExamplesFilePath());
		$strDeleteStatus 			= self::deleteFiles($strPluginName);
		
		$strStatus = "Uninstalling plugin " . $strPluginName . "\r\n\r\n";
		if ($blnMasterConfigUpdated) {
			$strStatus .= "Master plugin configuration file updated\r\n";
		}
		if ($blnIncludesFileUpdated) {
			$strStatus .= "Class file references updated\r\n";
		}
		if ($blnExamplesConfigUpdated) {
			$strStatus .= "Examples file references updated\r\n";
		}
		
		$strStatus .= $strDeleteStatus;
		
		$strStatus .= "\r\nUninstallation completed successfully.";
		
		return $strStatus;
	}
	
	private static function deleteFiles($strPluginName) {		
		$strResult = "\r\nDeleting plugin files:\r\n";

		$assetsPath = __DOCROOT__ . __PLUGIN_ASSETS__ . '/' . $strPluginName;
		if (file_exists($assetsPath)) {
			$deletedItems = self::deleteFolderRecursive($assetsPath);
			$strResult .= "- Deleted " . $deletedItems . " files from the plugin assets directory\r\n";
		} else {
			$strResult .= "- Nothing was deleted from the plugin assets directory\r\n";
		}
		
		$includesPath = __PLUGINS__ . '/' . $strPluginName;
		if (file_exists($includesPath)) {
			$deletedItems = self::deleteFolderRecursive($includesPath);
			$strResult .= "= Deleted " . $deletedItems . " files from the plugin includes directory\r\n";
		} else {
			$strResult .= "- Nothing was deleted from the plugin includes directory\r\n";
		}
		
		return $strResult;
	}
	
	private static function deleteFromMasterConfig($strPluginName) {
		$oldContents = self::readFile(self::getMasterConfigFilePath());
		
		$doc = new SimpleXMLElement($oldContents);
		$found = false;
		foreach($doc as $plugin) {
			if($plugin->name == $strPluginName) {
				$dom = dom_import_simplexml($plugin);
				$dom->parentNode->removeChild($dom);
				$found = true;
				break;
			}
		}
		$newContents = $doc->asXml();
		
		$newContents = self::stripExtraNewlines($newContents);
		self::writeFile(self::getMasterConfigFilePath(), $newContents);
		
		return $found;
	}
	
	private static function removeMarkedSectionHelper($strPluginName, $strFileName) {
		$oldContents = self::readFile($strFileName);
		
		$search = str_replace("\r\n", "", self::getBeginMarker($strPluginName) . ".*" . self::getEndMarker($strPluginName));
		
		$intReplacementCount = 0;
		$newContents = preg_replace('|' . $search . '|s', '', $oldContents, -1, $intReplacementCount);
		$newContents = self::stripExtraNewlines($newContents);
		
		self::writeFile($strFileName, $newContents);
		
		return $intReplacementCount;
	}
}

?>