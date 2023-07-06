// Capitalize
export function capitalize(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}
// split before "/"
export function splitBefore(str) {
  return str.split("/")[0];
}
// split after "/"
export function splitAfter(str) {
  return str.split("/")[1];
}
// money formater
export function moneyFormater(num) {
  let usd = Intl.NumberFormat("en-US");
  let formated = "$ " + usd.format(num);
  return formated;
}

// money formater without $ symbol
export function moneyFormaterNoUsd(num) {
  let usd = Intl.NumberFormat("en-US");
  let formated = usd.format(num);
  return formated;
}