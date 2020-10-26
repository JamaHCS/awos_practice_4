const product = document.getElementById("product_id");
const typeProduct = document.getElementById("type_product");
const URL = window.location.origin + `/api/getType/`;

let result = "";

const getType = id => {
    fetch(URL + id)
        .then(response => {
            return response.text();
        })
        .then(response => {
            result = JSON.parse(response);
            typeProduct.value = result[0].description;
        });
};

const setType = () => {
    getType(product[product.selectedIndex].value);
};

product.addEventListener("change", setType);
