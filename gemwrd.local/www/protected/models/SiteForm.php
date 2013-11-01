<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class SiteForm extends CFormModel
{
        public $keys;
        protected $stopwords = array(
            '',
            'без',            
            'в',
            'для',
            'до',            
            'за',
            'и',
            'из',            
            'к',            
            'как',
            'на',
            'от',  
            'по',            
            'с',
            'со',  
            'у',            
            'чем',
            'and',            
            'by',
            'not',            
            'or',            
        );

        /**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function getWords($array)
	{
            $result = '';
            $minus = '';
            //Массив с масками
            $target = explode("\n", $array);
            //Массив с списком фраз
            $search = $target;
            //Пройдем все искомые маски
            foreach ($target as $keytarget => $mask) {
                //Разделим ключ на части
                $parts = explode(" ", $mask);
                $array1 = array();
                foreach ($parts as $value) {
                    $array1[] = trim($value);
                }
                //Пройдем в цикле весь список ключевых фраз
                foreach ($search as $keysearch => $keyword) {

                    //Разобъем ключ на части
                    $keywordparts = explode(" ", $keyword);
                    $array2 = array();
                    foreach ($keywordparts as $value) {
                        $array2[] = trim($value);
                    }
                    //Нужно проверить что маска входит полностью в анализируемый массив и тогда уже подбирать минус
                    $intersect = array_intersect ($array1, $array2);
                    $diff = array_diff($array1, $intersect);
                    //Если разница в массивах пустая тогда маска входит в искомую фразу
                    if (empty($diff)) {
                        //Нужно найти минус-слово
                        $diff = array_diff($array2, $array1);
                        //print_r($diff);
                        if (true !== empty($diff)) {
                            foreach ($diff as $key => $val) {
                                //Если минус-слово входит в список стоп-слов, тогда пропускаем его
                                if (false != array_search($val, $this->stopwords)) {                                    
                                    continue;                                    
                                }
                                $minus = $minus.' -'.$val;
                            }
                        } 
                    }

                }
            $minus = explode(" ", $minus);
            $minus = array_unique($minus);
            $minus = implode(" ", $minus);
            $result[] = $mask.$minus;
            $minus = '';
            } 
            //print_r($this->stopwords);
            return $result;
	}
}