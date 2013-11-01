<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class PluswordsForm extends CFormModel
{
        /**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function getWords($mask, $keys)
	{
            //Результат
            $result = array();
            //Массив масок
            $target = explode("\n", $mask);
            //Массив фраз
            $search = explode("\n", $keys);

            //Пройдем все искомые маски
            foreach ($target as $keytarget => $valmask) {

                //Пройдем в цикле весь список ключевых фраз
                foreach ($search as $keysearch => $keyword) {

                    //Найдем вхождение маски в ключ
                    if (substr_count($keyword, $valmask)) {
                        $result[] = $keyword; 
                    }
                }
            }
            return $result;
	}
}