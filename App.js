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
          const response = await fetch("/AJAX/Savecomment.php", {
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