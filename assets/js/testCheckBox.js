var checkBox = document.getElementsByName('subCheck');
var j=0;
function testCheckbox() {
   for(var i=0;i<checkBox.length;i++){
       if(checkBox[i].checked) {
           j++
       } else {
       checkBox[i].disabled = false;
       };
   }

   if(j>2) {
       checkBox.forEach(el => {
           if (el.checked == false) {
               el.disabled = true;
           }
       });
   }
   j=0;
}
checkBox.forEach(element => {
   element.addEventListener('click', function(){
   testCheckbox();
   });
});
