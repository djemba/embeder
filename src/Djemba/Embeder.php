<?php
namespace Djemba;

class Embeder
{
    public $jquery = '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js';
    public $liveEvent = '';
    public $stream = '';
    public $analytics = false;
    public $host = '';
    public $analyticsId = '';
    public function makeHLS() {
      $iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
      $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
      $iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
      $Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
      $webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
      echo '<div style="width:100%; height:100%">
            <script src="'.$this->jquery.'"></script>';
      if($iPod || $iPhone || $iPad):
        echo '<script src="http://jwpsrv.com/library/Rvg5ODVyEeKdAyIACp8kUw.js"></script>';
        echo "<div id='playerBxstUUeoYqCJ'></div>";
        echo "<script type='text/javascript'>
    jwplayer('playerBxstUUeoYqCJ').setup({
        file: 'http://{$this->host}:8134/hls-live/livepkgr/_definst_/{$this->liveEvent}/{$this->stream}.m3u8',
        height: $(window).height(),
        width: $(window).width(),
        aspectratio: '4:3',
        primary : 'html5',
        autostart: 'true',
    });
</script>";
      else:
        echo '<script src="http://jwpsrv.com/library/Rvg5ODVyEeKdAyIACp8kUw.js"></script>';
        echo "<div id='playergUyGBZzHWvBQ'></div>";
        echo "<script type='text/javascript'>
    jwplayer('playergUyGBZzHWvBQ').setup({
        file: 'rtmp://{$this->host}/livepkgr/{$this->stream}?adbe-live-event={$this->liveEvent}',
        height: $(window).height(),
        width: $(window).width(),
        aspectratio: '16:9',
        autostart: 'true',
    });
</script>";
      endif;
      echo '</div><style type="text/css">
      body{
      margin: 0;
      padding: 0
      }
      </style>';
      if($this->analytics) {
        if($this->analyticsId != '') {
          echo "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '{$this->analyticsId}', 'auto');
  ga('send', 'pageview');
  setInterval(function() {
    ga('send', 'pageview');
  }, 1000);

</script>";
        }
      }
    }
}
?>
</div>
