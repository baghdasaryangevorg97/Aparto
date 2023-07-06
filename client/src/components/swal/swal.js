import Swal from "sweetalert2";
import "sweetalert2/src/sweetalert2.scss";

export function success(text) {
  Swal.fire({
    // position: "bottom-left",
    icon: "success",
    title: `<h6>${text}</h6>`,
    showConfirmButton: false,
    timer: 1500,
    customClass: "swal",
  });
}

export function error(text) {
  Swal.fire({
    icon: "error",
    title: `<h6>${text}</h6>`,
    showConfirmButton: false,
    timer: 1500,
    customClass: "swal",
  });
}

export function goodJob(text) {
  Swal.fire("Good job!", text, "success");
}

export function oops() {
  Swal.fire("Oops...", "Something went wrong!", "error");
}
