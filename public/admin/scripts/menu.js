/*------------------------------------*/
/* Created by : Nguyễn Xuân Bách      */
/* Phone      : 0976.256.106          */
/* Mail       : Bachnx92@gmail.com    */
/* Skype      : Northstar.vn          */
/* Yahoo      : Bachnx92              */
/* Website    : http://northstar.vn/  */
/* -----------------------------------*/

$(document).ready(function(){

    /*Start Khi keo xuong se xuat hien mui ten len
    jQuery(document).scroll(function(){
        if(get_scrolltop()<jQuery(window).height()){
            var b=jQuery(window).height();
            jQuery("#gotop").hide()
        }else{
            jQuery("#gotop").show()
        }});
    jQuery("#gotop").click(function(a){
        jQuery("html, body").animate({scrollTop:"0px"},"slow")
    });
    //End Khi keo xuong se xuat hien mui ten len*/


    //Start menu
    jQuery(".h_menu_item").mouseover(function(){
        if(this.id != '0'){
            jQuery('#h_menu_sub_'+this.id).show();
            jQuery('#h_menu_'+this.id).addClass('curent');
            jQuery('#home').removeClass('curent');
        }
    });
    jQuery(".h_menu_item").mouseout(function(){
        if(this.id != '0'){
            jQuery('#h_menu_sub_'+this.id).hide();
            jQuery('#h_menu_'+this.id).removeClass('curent');
            jQuery('#home').addClass('curent');

        }
    });
    jQuery(".h_menu_item").mouseover(function(){
        var id_ = this.id;
        id_ = id_.replace("h_menu_sub_","");
        var widthBody = $("#"+id_).width();
        var total_width = 0;
        var number1 = id_.replace("s","");
        for(var i=1;i<number1;i++){
             total_width = total_width + $("#s"+i).width();
        }
        total_width = "-"+total_width+"px";
        jQuery('#'+id_).addClass('hover_active');
        jQuery('.active').removeClass('curent');
//        jQuery('.h_menu_sub_public').css({'left':total_width});
    });
    jQuery(".h_menu_item").mouseout(function(){
        var id_ = this.id;
        id_ = id_.replace("h_menu_sub_","");
        jQuery('#'+id_).removeClass('hover_active');
        jQuery('.active').addClass('curent');
    });


    jQuery(".h_menu_sub_").mouseover(function(){
        var id_ = this.id;
        id_ = id_.replace("h_menu_sub_","");
        jQuery('#'+id_).addClass('hover_active');
    });
    jQuery(".h_menu_sub_").mouseout(function(){
        var id_ = this.id;
        id_ = id_.replace("h_menu_sub_","");
        jQuery('#'+id_).removeClass('hover_active');
    });
    //end menu
});
