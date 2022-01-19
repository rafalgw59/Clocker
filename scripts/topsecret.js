window.addEventListener('DOMContentLoaded', (event) => {
	
	window.scrollTo(window.scrollX, window.scrollY - 1);
	window.scrollTo(window.scrollX, window.scrollY + 1);

	var finish = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65]
	var elements = []
	var ricardo = false;
	
	function cmpArrays(arr1, arr2) {
		if(arr1.length != arr2.length) return false;
		
		for(let i = 0; i < arr1.length; i++) {
			if(arr1[i] != arr2[i]) return false;
		}
		
		return true;
	}
	
	function checkArrays(arr1, arr2) {
		let cnt = 0;
		for(let i = 0; i < arr1.length; i++) {
			if(arr1[i] == arr2[i])  {
				cnt += 1
			}
			if(cnt == arr1.length) return true;
		}
		return false;
	}
	
	
	function makeNewPosition(){
    var h = $(window).height() - 50;
    var w = $(window).width() - 50;
    
    var nh = Math.floor(Math.random() * h);
    var nw = Math.floor(Math.random() * w);
    
    return [nh,nw];    
    
	}

	function animateDiv(){
		var newq = makeNewPosition();
		$('#ricardo').animate({ top: newq[0], left: newq[1] }, function(){
		  animateDiv();        
		});
		
	};

	let milos = document.getElementById("topsecret");
	let milos2 = document.getElementById("topsecret2");
	milos.style.display = "none";
	milos2.style.display = "none";

	window.addEventListener("keydown", (e) => {
	
		elements.push(e.keyCode)
		
		console.log(elements)
		
		if(!checkArrays(elements, finish)) {
			elements = []
		}
	
		if(!ricardo && cmpArrays(finish, elements)) {
			milos.style.display = "block"
			milos2.style.display = "block";
			ricardo = true;
		}
	});
});