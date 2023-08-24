document.querySelectorAll(".btnAddComment").forEach(button => {
    button.addEventListener("click", function() {
    //todo_id
    let todo_id = this.dataset.todoId;
    let text = this.closest(".comment-form").querySelector(".commentText").value;

    console.log(todo_id);
    console.log(text);

    //post to db with AJAX
    async function upload(formData) {
        try {
          const response = await fetch("AJAX/Savecomment.php", {
            method: "POST",
            body: formData,
          });
          const result = await response.json();
          console.log("Success:", result);
          //insert comment in DOM
            let comment = document.createElement("div");
            comment.classList.add("comment");
            comment.innerHTML = `
            <div class="comment__text">
                <p>${text}</p>
            </div>
            <div class="comment__info">
                <p class="comment__date">Just now</p>
                <p class="comment__author">By: ${result.author}</p>
            </div>
            `;
            document.querySelector(`.comments[data-todo-id="${todo_id}"]`).prepend(comment);
            //clear input
            document.querySelector(`.comment-form[data-todo-id="${todo_id}"]`).querySelector(".commentText").value = "";

        } catch (error) {
          console.error("Error:", error);
        }
      }
      
      let formData = new FormData();
      
      formData.append("text", text);
      formData.append("todo_id", todo_id);
      
      upload(formData);   


    });
});