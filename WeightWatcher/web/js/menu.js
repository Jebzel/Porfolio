$(function() {
  /* Navigation */
//alert ("entro");
  if ($('#navigation'))
  {
  
     var nav_resting_width = "-60px";
     var nav_hover_width = "0px";
     var delay = 400;
      //if (mostrar!='0')
      //{
      //    mostrar='0';
          $('#navigation > li').each(function(e)
          {
              //   alert ("no entro");
             if ($('body').hasClass(this.className)) {
                $('a', this).stop().animate({marginLeft:nav_hover_width}, 600);
              }
              else {
                $(this).hover(function() {
                  $('a', this).stop().animate({marginLeft:nav_hover_width}, 200);
                },
                function () {
                  $('a', this).stop().animate({marginLeft:nav_resting_width}, 200);
                });
              }
          });
         
              $('#navigation > li').each(function(e)
              {
                 $('a', this)
                    .fadeTo(delay, .8)
                    .animate({marginLeft:nav_hover_width}, 200)
                    .animate({marginLeft:nav_resting_width}, 200);
                 delay += 100;
              });
          
          if ($('body').hasClass('courses'))
          {
            $('.content blockquote p').wrapInner('<span></span>');
          }
   /* }
      else
      {
        //  alert("entro");
           $('#navigation').each(function(e)
              {
                $('a', this)
                    .animate({marginLeft:nav_resting_width}, 200);
              });
      }*/
   }
});