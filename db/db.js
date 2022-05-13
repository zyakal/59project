const mysql = require("mysql2");

const pool = mysql.createPool({
  host: "호스트",
  user: "유저",
  database: "데이터베이스",
  password: "비밀번호",
});
