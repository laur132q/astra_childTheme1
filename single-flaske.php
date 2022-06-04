<?php
/**
 * The template for displaying the front page
 
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="singleview_main" class="site-main">
      <article id="singleView-slik">
        <div id="det_her_skal_blive_lille">
        <img id="single-flaske-billede" class="pic" src="" alt=""/>
        </div>
          <div id="alt_indhold_for_single_view">

            <div id="single-overskrift-og-storelse">
               <h2 id="single-overskrift_nummeret"></h2>
                <div id="single-flaske-container">
         	         <button class="single-liter-knapper-lille">
	        	          0,25L 
         	         </button>

         	         <button class="single-liter-knapper-stor">
                    0,5L 
                   </button>
                 </div>
               
	<div id="container">
	<div>
		<h5>Lille - 0,25L</h5>
		<p>29,95 kr</p>
	</div>
	<div>
		<h5>Stor - 0,5L</h5>
		<p>39,95 kr</p>
	</div>
</div>

</div>

              



           <h3 class="kortbeskrivelse"></h3>
            <p class="langbeskrivelse"></p>
            <div id="single-kanpper-i-bunden">   
               <button id="tilbage">
                 <p>
                   Shop videre
                </p>
               </button>
                <!-- <button id ="antal-kanppen">Antal</button> -->
                <button id="single-knapper-i-bunden-kob">Læg i kurv</button>
           </div>

            <div id="container-tilbage">
           
             </div>
          </div>
           <!-- <div id="single-kanpper-i-bunden">
                <button id ="antal-kanppen">Antal</button>
                <button id="single-knapper-i-bunden-køb">Lig i kurv</button>
           </div>

            <div id="container-tilbage">
               <button id="tilbage">
                 <p>
                   Shop videre
                </p>
               </button>
             </div> -->
    </article>
 </div>
      
    
     <!-- <div id="single-kanpper-i-bunden">
       <button id ="antal-kanppen">Antal</button>
       <button id="single-knapper-i-bunden-køb">Lig i kurv</button>
     </div>

     <div id="container-tilbage">
     <button id="tilbage">
         <p>
       Shop videre
        </p>
    </button>
    </div> -->
 </main>
</div>
    <script>
   
      
      // let ret;

      const url = `https://laurakapper.dk/kea/2.semester/kombucha-site/wp-json/wp/v2/flaske/<?php echo get_the_ID() ?>`; 

      // settings, test data, tag link, husk at fjerne max
      // key = database, API keys, manage dem --> Selve nøglen

     

      async function getJson() {
        const data = await fetch(url);
        flaske = await data.json();
        visSlikket();

      }


      function visSlikket() {
document.querySelector("h2").textContent = flaske.title.rendered;
 document.querySelector(".pic").src = flaske.billede[0].guid;
 document.querySelector(".kortbeskrivelse").textContent = flaske.kortbeskrivelse;
  document.querySelector(".langbeskrivelse").textContent = flaske.langbeskrivelse;
  // document.querySelector(".pris").textContent = slik.pris + " kr.";

  // klon.querySelector("img").src = 
	// 	klon.querySelector("h3").textContent = flaske.title.rendered;

	// 	klon.querySelector(".navn").innerHTML = flaske.kortbeskrivelse;


      }

      document.querySelector("#tilbage").addEventListener("click", () => {
        history.back();
      });
      
      getJson();

const lille = document.querySelector(".single-liter-knapper-lille")
const stor = document.querySelector(".single-liter-knapper-stor")

lille.addEventListener("click", billedeSkift1);
stor.addEventListener("click", billedeSkift2);

function billedeSkift1() {
  document.querySelector(".pic").src = flaske.billede[1].guid;
}
function billedeSkift2() {
  document.querySelector(".pic").src = flaske.billede[0].guid;
}



lille.addEventListener("click", function(e) {
  //  this.classList.toggle("is-active"); 
   skiftFarveIgen();
});

function skiftFarveIgen() {
   console.log(event.target);
   let valgt = event.target;
      document.querySelectorAll("#single-flaske-container button").forEach(elm => {elm.classList.remove("is-active")});
      valgt.classList.add("is-active");
     

}

stor.addEventListener("click", function(e) {
  //  this.classList.toggle("is-active"); 
   skiftFarveIgen();
});




  
</script>



<?php
get_footer();
