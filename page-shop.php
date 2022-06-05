<script>
	console.log("mit_script_loader");
	</script>
<?php

get_header();
?>
<div id="primary" class="content-area">

 <main id="shop_main" class="site-main">
<div id="web_overskrift_og_billede">
<div id="stort_billede">
	
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/shop-splash.webp" alt="billede_med_flasker"  />

  </div>
  <!-- <div id="beskrivelse_under_h1"> -->
		
		 <!-- <p id="intro_til_shop">Kombucha er en sprudlende, forfriskende læskedrik fremstillet ved at fermentere the. Her på vores hsop har du mulighed for at vælge lige netop din yndlings kombucha! </p> -->
		


<!-- </div> -->
 <h2 id="overkrift_til_shoppen">Shop</h2>
 <!-- <h3 id="priser">Priser</h3> -->
<div id="container">
	
	<div id="lille_pris">
		<h5>Lille - 0,25L</h5>
		<p>29,95 kr</p>
	</div>
	<div id="stor_pris">
		<h5>Stor - 0,5L</h5>
		<p>39,95 kr</p>
	</div>
</div>
</div>

<div id="web-responsiv">

<div id="den_skal_være_i_midten">
     <button id="mobil-filter-knapSHOP" >
		 Vælg din smag
		 </button>
		 <!-- <button id="mobil-filter-luk" class="vis_ikke">Luk</button> -->
		 <nav id="filterSHOP" class="filter_class">
	       <button data-flaske="alle" id="alleSHOP"class="vis_ikke">Alle</button>
        </nav>
	
</div>
        

     <section id="flaske" ></section>
 </div>
</main><!-- #main -->
  <template>
	 <article id="test1">
		 <img src="" alt=""> 
		 <h6></h6>
		 <h5 class="navn"></h5>
		<!-- <p class="pris"></p> -->
		<!-- <p class="oprindelse"></p> -->
	 </article>
  </template>
</div>


<script>
	console.log("mit_script_loader");
	let flasker = [];
	let categories;
	// Er de to egentligt ikke det samme? 
	let filterflaske ="alle";
	const liste = document.querySelector("#flaske");
	let temp = document.querySelector("template");
	
	document.addEventListener("DOMContentLoaded", start);

	function start() {
		console.log("start");
		// Hvad er nu forskellen mellem at gøre " " og ikke?
		getJson();
	
	}

const url = `https://laurakapper.dk/kea/2.semester/kombucha-site/wp-json/wp/v2/flaske?per_page=100`;
const catUrl = `https://laurakapper.dk/kea/2.semester/kombucha-site/wp-json/wp/v2/categories?per_page=100`;


async function getJson() {
	// asyncron funktion er noget som kan kører uafhængigt af noget andet-
	let response = await fetch(url);
	let catResponse = await fetch(catUrl);
	flasker = await response.json();
	categories = await catResponse.json();
	// Hvorfor er det man gør det på den her måde?? Du henter det også skal man definere det? 
	visFlasker();
	console.log(categories)
	opretKnapper();

}
function opretKnapper() {
categories.forEach(cat=> {
		document.querySelector("#filterSHOP").innerHTML += `<button class="filterKnapper vis_ikke"  data-flaske="${cat.id}">${cat.name}</button>`
	});


	addEventListenersToButtons();

}

function addEventListenersToButtons() {
document.querySelectorAll("#filterSHOP button").forEach(elm => {elm.addEventListener("click", filtrering);
})
};


function filtrering() {
filterflaske = this.dataset.flaske;
console.log(filterflaske);

visFlasker();

}

function visFlasker() {
	
	console.log(flasker);

	liste.innerHTML="";
	flasker.forEach(flaske=> {
		if (filterflaske =="alle"|| flaske.categories.includes(parseInt(filterflaske))){
let klon = temp.cloneNode(true).content;
        klon.querySelector("img").src = flaske.billede[0].guid;
		klon.querySelector("h6").textContent = flaske.title.rendered;

		klon.querySelector(".navn").innerHTML = flaske.kortbeskrivelse;
	
		// klon.querySelector(".pris").innerHTML = flaske.pris + " kr";
	
		// klon.querySelector(".oprindelse").innerHTML = flaske.oprindelsesregion;
		klon.querySelector("article").addEventListener("click", ()=>{location.href = flaske.link;})
		liste.appendChild(klon);
		}
	})

}

const btn = document.querySelector("#mobil-filter-knapSHOP");
// const luk = document.querySelector("#mobil-filter-luk");




const kategorier = document.querySelector("#filterSHOP");
const alle_knapper = document.querySelectorAll("#filterSHOP button");
// const navbarLinks = document.querySelector(".navbar-links");

// Der lyttes på burger menuen, om der bliver klikket
// Hvis der bliver klikket så skal den toggle klassen "active" på navigationen altså "åbne/display flex"
// Så skal burger menuen gemmes væk og vise krydset. (Gøres også med toggle)

btn.addEventListener("click", toggleHeleMenuen);


function toggleHeleMenuen()  {
	console.log("virker_det_her");
	// luk.classList.toggle("vis_ikke");
    document.querySelectorAll("#filterSHOP button").forEach(elm => {elm.classList.toggle("vis_ikke");
	btn.classList.toggle("vis_ikke");
	});

// let menuShown = btn.classList.contains("vis_ikke");
// if (menuShown) {
// 	btn.textContent = "X";

// }else {
// 	btn.textContent = "Smag";
// }


};


// luk.addEventListener("click", () => {
// 	console.log("virker_det_her??????");
// 	luk.classList.toggle("vis_ikke");
//     document.querySelectorAll("#filter button").forEach(elm => {elm.classList.toggle("vis_ikke");

// });
// });



	// kategorier.classList.toggle("vis_ikke");
	// alle_knapper.
//  lukbtn.classList.toggle("hidden");
//   btn.classList.toggle("hidden");
// .forEach(elm => {elm.addEventListener("click", filtrering);


// Så lytter vi efter klik på krydset, og hvis der klikkes på den skal det omvendte
// af det ovenståendende ske.

// lukbtn.addEventListener("click", () => {
//   navbarLinks.classList.toggle("active");
//   lukbtn.classList.toggle("hidden");
//   btn.classList.toggle("hidden");
// });

// window.addEventListener("load", sidenVises);

// function myFunction(x) {
//   if (x.matches) { 
	  // If media query matches
    // document.body.style.backgroundColor = "yellow";

//   } else {

//   }


// var x = window.matchMedia("(max-width: 690px)")
// myFunction(x) 
// x.addListener(myFunction) 
// Attach listener function on state changes




</script>

<?php
get_footer();



