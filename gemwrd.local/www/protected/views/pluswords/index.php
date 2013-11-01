<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?php echo $this->pageTitle; ?></title>
    <style>body{padding-top:60px; }</style>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">gemwrd</a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<!--<li><a href="#about">Фильтр -слов</a></li>-->
						<li><a href="/pluswords/">Фильтр +слов</a></li>
<!--						<li><a href="#contact">Загрузка в Яндекс.Директ</a></li>
						<li><a href="#contact">Загрузка в Google AdWords</a></li>
						<li><a href="#contact">Чеклист</a></li>-->
					</ul>
				</div> 
			</div>
		</div>
	</div>
	<div class="container">
            <div class="row">
                <div class="span12">
                    <h1><?php echo $this->title; ?></h1>
                    <h1>Фильтр списка плюс-слов</h1>
                    <p>Справка скоро появится ))</p>                  
                </div>
            </div>            
            <div class="row">
                <div class="span12">
                    <form method="post">
                            <fieldset>
                                    <legend>+ Слова</legend>
                                    <label>Список + слов</label>
                                    <?php $mask = $_POST['mask']; ?>
                                    <textarea name="mask" style="width: 100%;" rows="10"><?php echo $mask; ?></textarea>
                            </fieldset>                        
                            <fieldset>
                                    <legend>Фильтр</legend>
                                    <label>Список ключевых фраз</label>
                                    <?php $keys = $_POST['keys']; ?>
                                    <textarea name="keys" style="width: 100%;" rows="10"><?php echo $keys; ?></textarea>
                                    <button type="submit" class="btn">Получить</button>
                            </fieldset>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="span12">
                    <p>
                    <?php
                        foreach ($result as $value) {
                            echo CHtml::encode($value).'<br>';                                
                        }
                    ?>
                    </p>                  
                </div>
            </div>
	</div>
</body>
</html>