
const express = require("express");
const bodyParser = require("body-parser");
const nodemailer = require("nodemailer");
require("dotenv").config();


const app = express();
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

app.use(express.urlencoded({ extended: true }));
app.use(express.json());



app.get("/", (req, res) => {
    res.send("Server is running");
  });

app.post("/contact", (req, res) => {
  const { name, email, subject, message } = req.body;
  console.log("Received req", req.body);

  const transporter = nodemailer.createTransport({
    service: "gmail",
    auth: {
        user: process.env.USERNAME,
        pass: process.env.PASSWORD
    }
  });

  const mailOptions = {
    from: email,
    to: "sanjusivaji@gmail.com",
    subject: subject,
    text: `Name: ${name}\nEmail: ${email}\n\n${message}`
  };

  transporter.sendMail(mailOptions, (error, info) => {
    if (error) {
      console.log("Mail error:", error);
      return res.status(500).send("error");
    }
    console.log("Mail sent:", info.response);
    res.send("success");
  });
});

const PORT = process.env.PORT || 3000;

// app.listen(3000, () => {
//   console.log("Server started on port 3000");
// });
const PORT = process.env.PORT || 3000;

app.listen(PORT, () => {
  console.log(`Server started on port ${PORT}`);
});
