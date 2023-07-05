import React, { useEffect, useState } from "react";

const Home = () => {
    
    const [products, setProducts] = useState([]);

    const getProducts = async () => {
        const response = await fetch(`/api/products`);
        const products = await response.json();
        setProducts(products);
    }

    useEffect(() => {
        getProducts();
    }, [])

    return (
        <div>
            <h1>Trang chủ Unicode</h1>
            {
                products.map((product, index) => <h3 key={index}>{product}</h3>)
            }
        </div>
    );
};

export default Home;
