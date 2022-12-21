<?php

class Date
	{
        public $date = 0;
        public $monthRu = ['январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'];
        public $monthEn = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        public $weekRu = ['Monday' => 'понедельник', 'Tuesday' => 'вторник', 'Wednesday' => 'среда', 'Thursday' => 'четверг', 'Friday' => 'пятница', 'Saturday' => 'суббота', 'Sunday' => 'воскресенье'];
       
        public function __construct($date = null)
        {
            // если дата не передана, то пусть берется текущая
            if($date == null) {
               return $this->date = strtotime(date('d.m.Y'));
            }
            $this->date = $date;
            $this->date = strtotime($this->date);
        }
        public function getDay()
		{
            //возвращает день
			return date('d', $this->date);
		}
        public function getMonth($lang = null)
		{
            // возвращает месяц
            
            // переменная $lang может принимать значение ru или en 
            // если эта не пуста - пусть месяц будет словом на заданном языке 
            if($lang == 'ru' or $lang == null) {
                return $this->monthRu[(date('m', $this->date) - 1)];
            }elseif($lang == 'en') {
                return $this->monthEn[(date('m', $this->date) - 1)];
            }
            
		}
        public function getYear()
		{
			// возвращает год
            return date('Y', $this->date);
		}
        public function getWeekDay($lang = null)
		{
            // возвращает день недели
            
            // переменная $lang может принимать 		значение ru или en 
            // если эта не пуста - пусть день 				будет словом на заданном языке 
            if($lang == 'en') {
            return date('l', $this->date);
            }elseif($lang == 'ru' or $lang == null) {
                return $this->weekRu[date('l', $this->date)];
            }
		}
        public function addDay($value)
		{
			// добавляет значение $value к дню
            return date('d', ($this->date + ($value*3600*24)));
		}
        public function subDay($value)
		{
			// отнимает значение $value от дня
            return date('d', ($this->date - ($value*3600*24)));
		}
        public function addMonth($value)
		{
			// добавляет значение $value к месяцу
            $thisFunctionsMonth = $this->date + strtotime("+$value month");
            return date('m', $thisFunctionsMonth);
		}
        public function subMonth($value)
		{
			// отнимает значение $value от месяца
            $subFunctionsMonth =  $this->date - strtotime("+$value month");
            return date('m', $subFunctionsMonth);
		}
    }

$date = new Date('18.11.2022');
// echo $date->getDay();   //возвращает день
// echo $date->getMonth('en');     //возвращает месяц на английском
// echo $date->getMonth();     //возвращает месяц на русском
// echo $date->getYear();  //возвращает год
// echo $date->getWeekDay('en');  //возвращает день недели на английском
// echo $date->getWeekDay();  //возвращает день недели на русском
// echo $date->addDay(15); //добавляет дни к дате
// echo $date->subDay(9);  //отнимает дни от даты
// echo $date->addMonth(2);  //прибавляет месяца
// echo $date->subMonth(9); //отнимает месяца