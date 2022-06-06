

<!-- Er for at tjekke at den læser  -->
<script>
	console.log("mit_script_loader");
	</script>
<?php

get_header();

?>



<!-- Opsætning på side og definition af filterings knapperne -->
<div id="primary" class="content-area">

 <main id="forhandlere_main" class="site-main">
<div id="web-responsiv">
<div id="den_skal_være_i_midten-FORHANDLERE">
     <button id="mobil-filter-knap" >
		 Filter
		 </button>
		 <nav id="filterFORHANDLERE" class="vis_ikke" >
	       <button id="alleForhandlere"data-steder="alle">Alle</button>
        </nav>
	
<!-- class="vis_ikke" -->

</div>
     


     <section id="forhandlere" ></section>
</main><!-- #main -->
  <template>
	 <article id="test2">
		 <img src="" alt=""> 
		 <h3></h3>
		 <p class="navn"></p>
		<!-- <p class="pris"></p> -->
		<!-- <p class="oprindelse"></p> -->
	 </article>
  </template>
</div>


<script>
	console.log("mit_script_loader");
	let forhandlere = [];
	let categories;
	// Er de to egentligt ikke det samme? 
	let filterforhandler ="alle";
	const liste = document.querySelector("#forhandlere");
	let temp = document.querySelector("template");
	
	document.addEventListener("DOMContentLoaded", start);

	function start() {
		console.log("start");
		// Hvad er nu forskellen mellem at gøre " " og ikke?
		getJson();
	
	}

const url = `https://laurakapper.dk/kea/2.semester/kombucha-site/wp-json/wp/v2/forhandler?per_page=100`;
const catUrl = `https://laurakapper.dk/kea/2.semester/kombucha-site/wp-json/wp/v2/sted?per_page=100`;


async function getJson() {
	// asyncron funktion er noget som kan kører uafhængigt af noget andet-
	// Det er pinden der bliver kastet 
	let response = await fetch(url);
	let catResponse = await fetch(catUrl);

	// Du giver din variable, json indhold, det du fetcher
	// Det er hunden som henter pinden til dig
	forhandlere = await response.json();
	categories = await catResponse.json();
	// Hvorfor er det man gør det på den her måde?? Du henter det også skal man definere det? 

	// Vi starter to nye funktioner
	visForhandlere();
	console.log(categories)
	opretKnapper();

}

function opretKnapper() {
categories.forEach(cat=> {
		document.querySelector("#filterFORHANDLERE").innerHTML += `<button class="filterKnapper" data-steder="${cat.id}">${cat.name}</button>`
	});


	addEventListenersToButtons();

}

function addEventListenersToButtons() {
document.querySelectorAll("#filterFORHANDLERE button").forEach(elm => {elm.addEventListener("click", filtrering);
})
};


function filtrering() {
filterforhandler = this.dataset.steder;
console.log("hello-test",filterforhandler);

visForhandlere();

}

function visForhandlere() {
	
	console.log(forhandlere);
	console.log("hello-test-igen")

	liste.innerHTML="";
	forhandlere.forEach(forhandler=> {
		if (filterforhandler == "alle"|| forhandler.sted.includes(parseInt(filterforhandler))){

let klon = temp.cloneNode(true).content;
        klon.querySelector("img").src = forhandler.billede.guid;
		klon.querySelector("h3").textContent = forhandler.title.rendered;

		klon.querySelector(".navn").innerHTML = forhandler.adresse;
	
		// klon.querySelector(".oprindelse").innerHTML = flaske.oprindelsesregion;
		// klon.querySelector("article").addEventListener("click", ()=>{location.href = flaske.link;})
		liste.appendChild(klon);
		}
	})

}

// const btn = document.querySelector("#mobil-filter-knap")



// const kategorier = document.querySelector("#filter");
// const navbarLinks = document.querySelector(".navbar-links");

// Der lyttes på burger menuen, om der bliver klikket
// Hvis der bliver klikket så skal den toggle klassen "active" på navigationen altså "åbne/display flex"
// Så skal burger menuen gemmes væk og vise krydset. (Gøres også med toggle)

// btn.addEventListener("click", () => {
// 	kategorier.classList.toggle("vis_ikke");

// });





const btn = document.querySelector("#mobil-filter-knap");





const kategorier = document.querySelector("#filterFORHANDLERE");
const alle_knapper = document.querySelectorAll("#filterFORHANDLERE button");


btn.addEventListener("click", toggleHeleMenuen);


function toggleHeleMenuen()  {
	console.log("virker_det_her");
	// luk.classList.toggle("vis_ikke");
    document.querySelectorAll("#filterFORHANDLERE button").forEach(elm => {elm.classList.toggle("vis_ikke");
	btn.classList.toggle("vis_ikke");
	});

};



</script>

 <?php
get_footer();






