const containerPost = document.querySelector(".container-post");

const createPostBtn = document.querySelector(".create-post-button");
const csrfToken = document.querySelector("meta[name='csrf-token']").content;
const postForm = document.querySelector(".create-post-form");
const textareaPostForm = document.querySelector(".create-post-form .textarea");

let posts = [];
let users = [];

window.addEventListener("DOMContentLoaded", () => {
    createPostBtn.addEventListener("click", () => {
        postForm.style.display = "flex";
        createPostBtn.style.display = "none";
    });

    postForm.addEventListener("submit", (e) => {
        e.preventDefault();

        axios
            .post("/posts", {
                csrf_token: csrfToken,
                post: textareaPostForm.value,
            })
            .then((res) => {
                console.log(res.data);
            })
            .catch((err) => console.log(err));
    });
});
