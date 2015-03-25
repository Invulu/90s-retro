<script type="text/javascript">

/*
Counter script
By JavaScript Kit (http://javascriptkit.com)
Over 400+ free scripts here!
Above notice MUST stay entact for use
*/

function fakecounter(){

//decrease/increase counter value (depending on perceived popularity of your site!)
var decrease_increase=100

var counterdate=new Date()
var currenthits=counterdate.getTime().toString()
currenthits=parseInt(currenthits.substring(2,currenthits.length-4))+decrease_increase

document.write("<div class='fake-counter text-center'><span>"+currenthits+"</span></div>")
}
fakecounter()

</script>