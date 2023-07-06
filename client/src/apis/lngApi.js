import axios from "axios";

export default axios.create({
  baseURL: "link",
  headers: {
    "Accept-Language": "en-US,en;"
}
});

