<?
namespace Destiny;
use Destiny\Common\Utils\Tpl;
use Destiny\Common\Utils\Date;
use Destiny\Common\Config;
?>
<section class="container">
	<div class="content content-dark content-split clearfix row-no-padding">
		<div id="youtube" class="col-sm-6 stream">
			<h3 class="title clearfix">
				<span>Videos</span> <a href="/youtube" class="youtube-title">youtube.com</a>
			</h3>
			<ul class="thumbnails">
			<?if(isset($model->playlist['items']) && !empty($model->playlist['items'])):?>
			<?foreach($model->playlist['items'] as $vid ):?>
				<?$title = Tpl::out($vid['snippet']['title'])?>
				<li>
					<div class="thumbnail" data-placement="bottom" data-toggle="tooltip" title="<?=$title?>">
						<a
							href="//www.youtube.com/watch?v=<?=$vid['snippet']['resourceId']['videoId']?>">
							<img alt="<?=$title?>" src="<?=Config::cdn()?>/web/img/320x240.gif"
							data-src="//i.ytimg.com/vi/<?=$vid['snippet']['resourceId']['videoId']?>/default.jpg" />
						</a>
					</div>
				</li>
			<?endforeach;?>
			<?else:?>
				<li><p class="loading">Loading videos ...</p></li>
			<?endif;?>
			</ul>
		</div>
		<div id="broadcasts" class="col-sm-6 stream">
			<h3 class="title clearfix">
				<span>Broadcasts</span> <a href="/twitch" class="twitch-title">twitch.tv</a>
			</h3>
			<ul class="thumbnails">
			<?if(isset($model->broadcasts) && !empty($model->broadcasts['videos'])):?>
			<?foreach( $model->broadcasts['videos'] as $broadcast ):?>
				<?$time = Date::getElapsedTime(Date::getDateTime($broadcast['recorded_at']))?>
				<li>
					<div class="thumbnail" data-placement="bottom" data-toggle="tooltip" title="<?=$time?>">
						<a href="<?=$broadcast['url']?>"> <img alt="<?=$time?>" src="<?=Config::cdn()?>/web/img/320x240.gif" data-src="<?=$broadcast['preview']?>" /></a>
					</div>
				</li>
			<?endforeach;?>
			<?else:?>
				<li>
					<p class="loading">Loading broadcasts ...</p>
				</li>
			<?endif;?>
			</ul>
		</div>
	</div>
</section>
