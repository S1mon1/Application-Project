const search = document.querySelector('input[placeholder="search offer"]');
const offerContainer =  document.querySelector(".offers");

search.addEventListener("keyup", function(event){
    if(event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function(response){
            return response.json();
        }).then(function(offers){
            offerContainer.innerHTML = "";
            loadOffers(offers)
        });
    }
});

function loadOffers(offers){
    offers.forEach(offer => {
        console.log(offer);
        createOffer(offer);
    });
}

function createOffer(offer){
    const template = document.querySelector("#offer-template");
    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `/public/uploads/${offer.image}`;

    const brand = clone.querySelector("h2");
    brand.innerHTML = offer.brand;

    const description = clone.querySelector("p");
    description.innerHTML = offer.description; 

    offerContainer.appendChild(clone);

}