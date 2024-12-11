// Hàm kiểm tra điều kiện cho từng trường khi mất focus (blur)
function validateField(event) {
  const field = event.target;
  const value = field.value;
  let isValid = true;
  let errorMessage = "";

  switch (field.name) {
    case "ho_ten":
      const hoTenPattern = /^[A-Z][a-z]*(\s[A-Z][a-z]*)+$/;
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
      // Kiểm tra có ít nhất một chữ và một số
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
}

// Gắn sự kiện 'blur' cho tất cả các trường input
document.querySelectorAll("input").forEach((input) => {
  input.addEventListener("blur", validateField);
});
