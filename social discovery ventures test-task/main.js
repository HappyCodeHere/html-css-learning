var selector = '.right-info ul li';

var elems = document.querySelectorAll(selector);

console.log(elems);

function makeActive() {
    for (var i = 0; i < elems.length; i++)
        elems[i].classList.remove('active');
    
    this.classList.add('active');
};

for (var i = 0; i < elems.length; i++)
    elems[i].addEventListener('click', makeActive);


document.querySelectorAll('.right-info ul').addEventListener('click', function(e) {
	console.log(e);
})