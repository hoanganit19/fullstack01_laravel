import "./bootstrap";
import { getMessage } from "./functions";
import img from "../images/650-1600x600.jpg";
import email from "../html/email.html?raw";

getMessage();

const imgEl = document.querySelector(".img");
imgEl.innerHTML = `<img src="${img}"/>`;

console.log(email);
