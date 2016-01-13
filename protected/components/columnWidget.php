<?php
class columnWidget{
    protected $settingWidget=array('discuss'=>'','topical'=>'','top_avtor'=>'');
    public function viewWidget(){
        if(!empty($this->settingWidget)){
            $info="";
            foreach($this->settingWidget as $key=>$value){
                if(method_exists($this,$key."Show")){

                    $method=$key."Show";
                     echo $this->$method();
                }
            }

        }
    }
    public function addWidget($key)
    {
        if(!empty($key)){
            $bufer=$this->settingWidget;
            $this->settingWidget=array($key=>"");
            foreach($bufer as $k=>$value){
                $this->settingWidget[$k]=$value;
            }
        }
    }

    private function familiariseShow(){
        return "<div class='discuss'>
            <h1>Для ознакомления:</h1>
            <a href='#'>О сайте</a>
            <a href='#'>Правила сайта</a>
            <a href='#'>Пользовательское соглашение </a>
        </div>";
    }
    private function discussShow(){
        return "<div class='discuss'>
            <h1>Обсуждаемое:</h1>
            <a href='#'>В Речице пьяный водитель уснул в машине посреди улицы. Пока спал, у него украли деньги, документы и кроссовки. <span>76</span></a>
            <a href='#'>В центре Минска МАЗ без водителя разбил 8 припаркованных автомобилей, 2 из них вытолкнул на тротуар <span>35</span></a>
            <a href='#'>ГАИ Минска усиливает контроль за скоростью в городе. <span>23</span></a>
            <a href='#'>«Надоело жить в грязи»: минский пенсионер за свой счет и в одиночку ремонтирует подъезд дома <span>15</span></a>
        </div>";
    }
    private function topicalShow(){
        return "<div class='topical'>
            <h1>Актуальные темы:</h1>
            <a href='#'>Новости</a>
            <a href='#'>Фото</a>
            <a href='#'>Юмор</a>
            <a href='#'>Гродно</a>
            <a href='#'>Минск</a>
            <a href='#'>Брест</a>
        </div>";
    }
    private function top_avtorShow(){
        return
        "<div class='top_avtor'>
            <h1>Топ авторов:</h1>
            <p></p>
            <a href='#'><img src=".Yii::app()->request->baseUrl."/images/Icon_profile.png"." alt=''/>Пет</a>
            <a href='#'><img src=".Yii::app()->request->baseUrl."/images/Icon_profile.png"." alt=''/>Jon</a>
        </div>";
    }
}
