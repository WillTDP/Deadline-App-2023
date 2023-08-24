//load comments when the page is loaded
document.addEventListener("DOMContentLoaded", async function() {
    const commentForms = document.querySelectorAll(".comment-form");

    commentForms.forEach(form => {
        const todo_id = form.querySelector(".btnAddComment").dataset.todoId;
        loadComments(todo_id);
    });
});

// Add event listener to the comment form submit button
document.querySelectorAll(".btnAddComment").forEach(button => {
    button.addEventListener("click", function() {
    event.preventDefault(); // Prevent the default form submission
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
          console.log(response);
          const result = await response.json();
          console.log("Success:", result);
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

// Function to load comments for a specific task
async function loadComments(taskId) {
    const commentsRow = document.querySelector(`.comments-row[data-task-id="${taskId}"]`);
    const commentsList = commentsRow.querySelector(".comments-list");

    try {
        const response = await fetch(`AJAX/GetComments.php?task_id=${taskId}`);
        const comments = await response.json();

        commentsList.innerHTML = ""; // Clear existing comments

        comments.forEach(comment => {
            const li = document.createElement("li");
            li.textContent = comment.text;
            commentsList.appendChild(li);
        });
    } catch (error) {
        console.error("Error:", error);
    }
}