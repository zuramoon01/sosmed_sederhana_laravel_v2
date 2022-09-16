const containerPost = document.querySelector(".container-post");
const containerComment = document.querySelector(".container-comment");

const createPostBtn = document.querySelector(".create-post-button");
const csrfToken = document.querySelector("meta[name='csrf-token']").content;
const postForm = document.querySelector(".create-post-form");
const textareaPostForm = document.querySelector(".create-post-form .textarea");

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
                const { username, post, date } = res.data;

                const article = document.createElement("article");
                article.innerHTML = `
                    <h3 class="author">${username}</h3>

                    <p class="content">${post}</p>

                    <p class="date">
                        ${date} WIB |
                        <a href="#" class="comment" onclick="displayCommentForm(this)">Komen</a>
                    </p>

                    <form action="#" class="create-comment-form">
                        <textarea name="comment" id="comment" cols="50" rows="3" class="textarea"></textarea>

                        <button class="submit">Buat Komen</button>
                    </form>

                    <div class="container-comment">
                    </div>
                `;

                containerPost.appendChild(article);
            })
            .catch((err) => console.log(err));

        createPostBtn.style.display = "flex";
        postForm.style.display = "none";
    });
});
