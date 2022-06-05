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
                  <!--Her opretter vi knapperne -->
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
                 <p id="shop_videre_lille">
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



      }

      document.querySelector("#tilbage").addEventListener("click", () => {
        history.back();
      });
      
      getJson();

// Her bliver knapperne defineret, som konstanter
const lille = document.querySelector(".single-liter-knapper-lille")
const stor = document.querySelector(".single-liter-knapper-stor")

// Der blvier sat en eventlistener på begge knapper
// Den lille knap, fører til funktionen billedSkift1 
// Den store knap, fører til funktionen billedSkift2 
lille.addEventListener("click", billedeSkift1);
stor.addEventListener("click", billedeSkift2);


// I denne funktion, tager vi fat i klassen .pic og siger at vi gerne 
// vil have vist nr.2 billede i arrayet, da det er billedet af den lille flaske
function billedeSkift1() {
  document.querySelector(".pic").src = flaske.billede[1].guid;
}
// I denne funktion, tager vi fat i klassen .pic og siger at vi gerne 
// vil have vist nr.1 billede i arrayet, da det er billedet af den store flaske
function billedeSkift2() {
  document.querySelector(".pic").src = flaske.billede[0].guid;
}

//! Her under er funktionen for stylingen af knapperne og den aktive klasse

// Her lytter vi på den lille og den store knap igen, og sender den videre til 
// fuctionen skiftFarveIgen. Det vi sender med (e) evernt object 
// Det vil altså sige, hvilke knap som er blevet trykket på
lille.addEventListener("click", function(e) {
   skiftFarveIgen();
});
stor.addEventListener("click", function(e) {
   skiftFarveIgen();
});

// Det er i denne funktion vi ændre den aktive farve på knapperne
function skiftFarveIgen() {
   console.log(event.target);
  //  Vi laver en variabel med navnet "valgt", den er ligmed "event object". Altså den trykte knap. 
   let valgt = event.target;
  //  Vi looper igennem alle knapper, og siger at for hver knap, så skal klasse "is-active" fjernes
      document.querySelectorAll("#single-flaske-container button").forEach(elm => {elm.classList.remove("is-active")});
  // Bagefter siger vi at, den som er "valgt" skal have klassen på
      valgt.classList.add("is-active");
}





  
</script>



<?php
get_footer();
