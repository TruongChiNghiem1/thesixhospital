// Function to validate the field
function validateField(event) {
  const field = event.target;
  let isValid = true;
  let errorMessage = "";

  switch (field.name) {
    case "ho_ten":
      // Loại bỏ dấu cách thừa ở đầu và cuối chuỗi
      value = value.trim();

      // Biểu thức chính quy để kiểm tra chữ cái đầu viết hoa cho mỗi từ
      const hoTenPattern =
        /^([A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯỲÝỴỶỸ][a-zàáâãèéêìíòóôõùúăđĩũơưỳýỵỷỹ]*)( [A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯỲÝỴỶỸ][a-zàáâãèéêìíòóôõùúăđĩũơưỳýỵỷỹ]*)*$/;

      // Kiểm tra nếu không khớp với regex
      if (!hoTenPattern.test(value)) {
        errorMessage = "Họ và tên phải viết hoa chữ cái đầu của mỗi từ!";
        isValid = false;
      }
      break;
    case "email":
      const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
      if (!emailPattern.test(value)) {
        errorMessage = "Email phải có dạng: example@gmail.com";
        isValid = false;
      }
      break;
    case "so_dien_thoai":
      const phonePattern = /^0\d{8,9}$/;
      if (!phonePattern.test(value)) {
        errorMessage =
          "Số điện thoại phải bắt đầu bằng 0 và có từ 9 đến 10 chữ số!";
        isValid = false;
      }
      break;
    case "dia_chi":
      const addressPattern = /^(?=.*[A-Za-z])(?=.*\d)/;
      if (!addressPattern.test(value)) {
        errorMessage = "Địa chỉ phải bao gồm cả số và chữ!";
        isValid = false;
      }
      break;
    case "ngay_sinh":
      const today = new Date();
      const birthDate = new Date(value);
      if (birthDate >= today) {
        errorMessage = "Ngày sinh phải trước ngày hiện tại!";
        isValid = false;
      }
      break;
    case "password":
      if (value.length < 8 || value.length > 10) {
        errorMessage = "Mật khẩu phải từ 8 đến 10 ký tự!";
        isValid = false;
      }
      break;
    case "confirm_password":
      const password = document.querySelector('[name="password"]').value;
      if (value !== password) {
        errorMessage = "Mật khẩu và xác nhận mật khẩu không khớp!";
        isValid = false;
      }
      break;
  }

  // Hiển thị hoặc xóa thông báo lỗi
  const errorElement = document.getElementById(`${field.name}_error`);
  if (!isValid) {
    errorElement.textContent = errorMessage;
    field.classList.add("is-invalid"); // Thêm lớp invalid nếu có lỗi
  } else {
    errorElement.textContent = "";
    field.classList.remove("is-invalid"); // Loại bỏ lớp invalid nếu không có lỗi
  }

  return isValid; // Return true or false to indicate if the field is valid
}

// Function to validate the field
function validateField(event) {
  const field = event.target;
  let isValid = true;
  let errorMessage = "";

  const value = field.value.trim(); // Get field value

  // Switch case for validation
  switch (field.name) {
    case "ho_ten":
      const hoTenPattern =
        /^[A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯỲÝỴỶỸ][a-zàáâãèéêìíòóôõùúăđĩũơưỳýỵỷỹ]*(\s[A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯỲÝỴỶỸ][a-zàáâãèéêìíòóôõùúăđĩũơưỳýỵỷỹ]*)+$/;
      if (!hoTenPattern.test(value)) {
        errorMessage = "Họ và tên phải viết hoa chữ cái đầu!";
        isValid = false;
      }
      break;

    case "email":
      const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
      if (!emailPattern.test(value)) {
        errorMessage = "Email phải có dạng: example@gmail.com";
        isValid = false;
      }
      break;
    case "so_dien_thoai":
      const phonePattern = /^0\d{8,9}$/;
      if (!phonePattern.test(value)) {
        errorMessage =
          "Số điện thoại phải bắt đầu bằng 0 và có từ 9 đến 10 chữ số!";
        isValid = false;
      }
      break;
    case "dia_chi":
      const addressPattern = /^(?=.*[A-Za-z])(?=.*\d)/;
      if (!addressPattern.test(value)) {
        errorMessage = "Địa chỉ phải bao gồm cả số và chữ!";
        isValid = false;
      }
      break;
    case "ngay_sinh":
      const today = new Date();
      const birthDate = new Date(value);
      if (birthDate >= today) {
        errorMessage = "Ngày sinh phải trước ngày hiện tại!";
        isValid = false;
      }
      break;
    case "password":
      if (value.length < 8 || value.length > 10) {
        errorMessage = "Mật khẩu phải từ 8 đến 10 ký tự!";
        isValid = false;
      }
      break;
    case "confirm_password":
      const password = document.querySelector('[name="password"]').value;
      if (value !== password) {
        errorMessage = "Mật khẩu và xác nhận mật khẩu không khớp!";
        isValid = false;
      }
      break;
  }

  // Hiển thị hoặc xóa thông báo lỗi
  const errorElement = document.getElementById(`${field.name}_error`);
  if (!isValid) {
    errorElement.textContent = errorMessage;
    field.classList.add("is-invalid"); // Thêm lớp invalid nếu có lỗi
  } else {
    errorElement.textContent = "";
    field.classList.remove("is-invalid"); // Loại bỏ lớp invalid nếu không có lỗi
  }

  return isValid; // Return true or false to indicate if the field is valid
}

// Function to validate the entire form on submit
function validateForm(event) {
  let isFormValid = true;

  // Validate each input field
  document.querySelectorAll("input").forEach((input) => {
    if (!validateField({ target: input })) {
      isFormValid = false; // If any field is invalid, set form as invalid
    }
  });

  // If form is invalid, prevent submission
  if (!isFormValid) {
    event.preventDefault(); // Prevent form submission
    alert("Vui lòng sửa các lỗi trong biểu mẫu!");
  }
}

// Gắn sự kiện 'blur' cho tất cả các trường input để kiểm tra mỗi khi rời khỏi trường
document.querySelectorAll("input").forEach((input) => {
  input.addEventListener("blur", validateField);
});

// Gắn sự kiện 'submit' cho form để kiểm tra khi người dùng nhấn submit
const form = document.querySelector("form"); // Ensure you select the correct form
form.addEventListener("submit", validateForm);

// Lắng nghe sự kiện click trên nút submit
document
  .getElementById("submitButton")
  .addEventListener("click", function (event) {
    event.preventDefault(); // Ngừng việc gửi form tự động

    // Kiểm tra tính hợp lệ của form (ở đây giả sử có hàm validateForm() để kiểm tra form)
    if (validateForm()) {
      // Nếu form hợp lệ, gửi form
      const form = document.querySelector("form"); // Chọn form

      // Gửi form (bạn có thể gửi form bằng AJAX hoặc gửi bình thường)
      form.submit(); // Sử dụng form.submit() để gửi form

      // Đóng modal sau khi gửi form thành công
      var myModal = new bootstrap.Modal(document.getElementById("myModal"));
      myModal.hide(); // Đóng modal bằng Bootstrap
    } else {
      // Nếu form không hợp lệ, bạn có thể thêm thông báo lỗi tại đây
      alert("Vui lòng sửa các lỗi trong form!");
    }
  });
