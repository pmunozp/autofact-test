const app = require("express")();
const mongoSanitize = require("mongo-sanitize");

const AnswerController = require("../controllers/AnswerController");

app.get("/api/answer/", (req, res, next) => {
    AnswerController.getAnwers()
        .then((answers) => {
            res.status(200).json(answers);
        }).catch((e) => {
            res.status(500).json(e);
        })
        .finally(() => {
            next();
        });
});

app.put("/api/answer/", (req, res, next) => {
    let answer = mongoSanitize(req.body);
    AnswerController.putAnswer(answer)
        .then((answer) => {
            res.status(200).json(answer);
        }).catch((e) => {
            console.log(e);
            res.status(500).json(e);
        })
        .finally(() => {
            next();
        });
});

module.exports = app;