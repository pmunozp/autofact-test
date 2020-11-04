const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const answerSchema = new mongoose.Schema({
    question: { type: String, required: true },
    answer: { type: String, required: true },
    userId: { type: Number, required: true }
});


module.exports = mongoose.model('answer', answerSchema);