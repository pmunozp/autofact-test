const AnswerModel = require("../models/answer");

const AnswerController = {

    getAnwers: () => {
        return new Promise(async(res, rej) => {
            try {
                let answers = await AnswerModel.find().exec();
                res(answers);
            } catch (e) {
                rej(e);
            }
        });

    },

    putAnswer: (answer) => {
        return new Promise(async(res, rej) => {
            try {
                answer = new AnswerModel(answer);
                await answer.save();
                res(answer);
            } catch (e) {
                console.log(e);
                rej(e);
            }
        })
    }
}

module.exports = AnswerController;