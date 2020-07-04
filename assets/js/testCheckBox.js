var checkBox = document.getElementsByName('subCheck[]');

function testCheckbox() {
    let j=0;
    for(var i=0;i<checkBox.length;i++){
        if(checkBox[i].checked) {
            j++
        }
        checkBox[i].disabled = false;
    }
    if(j<=0) {
            checkBox[0].checked = true;
        }
    if(j>2) {       
        checkBox.forEach(el => {
            
            if (el.checked == false) {
                el.disabled = true;
            }
        });
    }

}
checkBox.forEach(element => {
   element.addEventListener('click', function(){
   testCheckbox();
   });
});
document.onload = testCheckbox();
