<style>
 .move-right{
   float: right;
}
.elementor-progress-wrapper{
    display:none;
}
.brand-color-green{
    background-color:#44a38b
}
.brand-color-yellow{
    background-color:#deca5a
}
.brand-color-red{
    background-color:#a73a6e
}
@media only screen and (max-width: 600px) {
    span.total-tooltip {
        padding: 10px;
        display: block;
        /* max-width: 300px; */
        background: rosybrown;
        text-align: center;
        color: #fff;
        border-radius: 10px;
        margin-bottom: 45px;
        transform: translateX(-50%);
        position: absolute;
        left: 0%;
        top: 0;
        width: 286px;
        transition: all ease 0.5s;
    }
}
</style>
<script type="text/javascript">
    //Result Page calculation Here  
    jQuery(document).ready(function($) {
/* 
* Get perameter form urls
*
*https://yourdomain/result/?body=4&bodytotal=6&energy=2&energytotal=6&mode=1&modetotal=4&purpose=3&purposetotal=4&total=10
*/
const queryString = window.location.search;
/*
* Make object from url perameters 
*/
const urlParams = new URLSearchParams(queryString);
/*
        get value and store in varables 
*/
        const body = urlParams.get('body')
        const bodytotal = urlParams.get('bodytotal')
        const energy = urlParams.get('energy')
        const energytotal = urlParams.get('energytotal')
        const mode = urlParams.get('mode')
        const modetotal = urlParams.get('modetotal')
        const purpose = urlParams.get('purpose')
        const purposetotal = urlParams.get('purposetotal')
        const total = urlParams.get('total')
        const grandtotal = parseInt(bodytotal) + parseInt(energytotal) + parseInt(modetotal) + parseInt(purposetotal);
/*
* Prepare percentage for progress par or calculation
*/
        var totalpercentage = total/grandtotal * 100;
        var bodypercentage = body/bodytotal * 100;
        var energypercentage = energy/energytotal * 100;
        var modepercentage = mode/modetotal * 100;
        var purposepercentage = purpose/purposetotal * 100;

    // assigning

        jQuery(".totalpoints").html(total);
        jQuery(".totalpoints + span").html(grandtotal);
        jQuery("#bodypoints").html(body);
        jQuery("#bodypoints + span").html(bodytotal);
        jQuery("#energypoints").html(energy);
        jQuery("#energypoints + span").html(energytotal);
        jQuery("#modepoints").html(mode);
        jQuery("#modepoints + span").html(modetotal);
        jQuery("#purposepoints").html(purpose);
        jQuery("#purposepoints + span").html(purposetotal);
    /*
    * appending value in html 
    */
        jQuery("#totalblock .progress-bar").css("left", ""+ parseInt(totalpercentage) +"%");
        jQuery("#totalblock span.total-tooltip").css("left", ""+ parseInt(totalpercentage) +"%");
        jQuery("#bodyblock .progress-bar").css("width", ""+ parseInt(bodypercentage) +"%");
        jQuery("#energyblock .progress-bar").css("width", ""+ parseInt(energypercentage) +"%");
        jQuery("#modeblock .progress-bar").css("width", ""+ parseInt(modepercentage) +"%");
        jQuery("#purposeblock .progress-bar").css("width", ""+ parseInt(purposepercentage) +"%");

        /* 
            Show text base on gain value from your urls
        */
        if(body <= 2){
            jQuery("#bodyblock .progress-bar").addClass("brand-color-red");
            var bodytext = "You’re having physical health issues";
        }else if(body == 3 || body == 4){
            jQuery("#bodyblock .progress-bar").addClass("brand-color-yellow");
            var bodytext = "Physically you have variable results.";
        }else if(body == 5 || body == 6 ){
            jQuery("#bodyblock .progress-bar").addClass("brand-color-green");
            var  bodytext = "Physically you are doing well."; 
        } 

        if(energy <= 2 ){
            jQuery("#energyblock .progress-bar").addClass("brand-color-red");
            var energytext = "Energy wise you need help";
        }else if(energy == 3 || energy == 4){
            jQuery("#energyblock .progress-bar").addClass("brand-color-yellow");
            var energytext = "Energy wise you have variable results";
        }else if(energy == 5 || energy == 6){
            jQuery("#energyblock .progress-bar").addClass("brand-color-green");
            var energytext = "Energy wise you are doing well";  
        } 

        if( mode <= 1){
            jQuery("#modeblock .progress-bar").addClass("brand-color-red");
            var modetext = "Mood wise you need help";
        }else if(mode == 2 || mode == 3 ){
            jQuery("#modeblock .progress-bar").addClass("brand-color-yellow");
            var modetext = "Mood wise you have variable results";
        }else if(mode == 4){
            jQuery("#modeblock .progress-bar").addClass("brand-color-green");
            var modetext = "Mood wise you are doing well"; 
        } 

        if(purpose <= 1){
         jQuery("#purposeblock .progress-bar").addClass("brand-color-red");
         var purposetext = "Purpose wise you need help";
        }else if( purpose == 2 || purpose == 3 ){
         jQuery("#purposeblock .progress-bar").addClass("brand-color-yellow");
         var purposetext = "Purpose wise you have variable results";
        }else if( purpose == 4){
            jQuery("#purposeblock .progress-bar").addClass("brand-color-green");
            var purposetext = "Purpose wise you are doing well";  
        } 

/*
        Manipulate text in html
*/

            jQuery("#bodytext").text(bodytext);
            jQuery("#energytext").text(energytext);
            jQuery("#modetext").text(modetext);
            jQuery("#purposetext").text(purposetext);


});
</script>