const containerPost = document.querySelector(".container-post");
const containerComment = document.querySelector(".container-comment");

const createPostBtn = document.querySelector(".create-post-button");
const csrfToken = document.querySelector("meta[name='csrf-token']").content;
const postForm = document.querySelector(".create-post-form");
const textareaPostForm = document.querySelector(".create-post-form .textarea");

const displayEditPostForm = (e) => {
    const action = e.parentElement;
    action.style.display = "none";

    const postContent = e.parentElement.previousElementSibling;
    const postText = [...postContent.children][1];

    const articlePost = e.parentElement.parentElement.parentElement;
    const postId = parseInt({ ...articlePost.dataset }["id"]);

    const editPostForm = document.createElement("form");
    editPostForm.setAttribute("action", `/posts/${postId}`);
    editPostForm.setAttribute("class", "post-form");
    editPostForm.setAttribute("method", "post");
    editPostForm.setAttribute("onsubmit", "editPost(this)");
    editPostForm.innerHTML = `
        <textarea name="post" id="post" cols="50" rows="5" class="textarea">${postText.innerText}</textarea>

        <button class="submit">Edit Pos</button>
    `;

    postContent.insertBefore(editPostForm, postText);
    postText.remove();
};

const editPost = (e) => {
    console.log(e);
};

const deletePost = (e) => {
    const articlePost = e.parentElement.parentElement.parentElement;
    const postId = parseInt({ ...articlePost.dataset }["id"]);

    axios
        .delete(`posts/${postId}`)
        .then((res) => {
            if (res.data === "success") {
                articlePost.remove();
            }
        })
        .catch((err) => console.log(err));
};

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
                const { username, id, post, date } = res.data;

                const article = document.createElement("article");
                article.classList.add("single-post");
                article.setAttribute("data-id", id);
                article.innerHTML = `
                    <div class="container-single-post">
                        <div class="content">
                            <h3 class="author">${username}</h3>

                            <p class="content">${post}</p>

                            <p class="date">
                                ${date} WIB |
                                <a href="#" class="comment" onclick="displayCommentForm(this)">Komen</a>
                            </p>
                        </div>

                        <div class="action">
                            <i class="fa-solid fa-marker icon-edit"></i>
                            <i class="fa-solid fa-trash icon-delete" onclick="deletePost(this)"></i>
                        </div>
                    </div>

                    <div class="container-comment">
                        <form action="#" class="create-comment-form">
                            <textarea name="comment" id="comment" cols="50" rows="3" class="textarea"></textarea>

                            <button class="submit">Buat Komen</button>
                        </form>
                    </div>
                `;

                containerPost.appendChild(article);

                createPostBtn.style.display = "flex";
                postForm.style.display = "none";
            })
            .catch((err) => console.log(err));
    });
});
