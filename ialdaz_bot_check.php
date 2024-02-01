from telegram.ext import Updater
from telegram.ext import CommandHandler

bot_token = ''

updater = Updater(token=6823356217:AAFRP2MuZFL0WYksV6AkuZWV516ljKTvDq4, user_context=True)
dispatcher = updater.dispatcher

def start(update, context):
    chat_id = update.message.chat_id
    first_name = update.message.from_user.first_name
    msg = f'Hola {first_name}, bienvenido a nuestro bot'

    context.bot.sendMessage(chat_id=chat_id, text=msg)

def sticker(update, context):
    chat_id = update.message.chat_id
    
    with open('sticker.png', 'rb') as sticker_file:
        context.bot.sendSticker(chat_id=chat_id, sticker=sticker_file,
        caption='Hola, te envio este sticker')

def photo(update, context):
    with open('photo.png', 'rb') as photo_file:
        context.bot.sendPhoto(chat_id=chat_id, photo=photo_file,
            caption='Hola, te envio esta foto')

start_handler = CommandHandler('start', start)
sticker_handler = CommandHandler('sticker', sticker)
photo_handler = CommandHandler('photo', photo)

dispatcher.add_handler(start_handler)
dispatcher.add_handler(sticker_handler)
dispatcher.add_handler(photo_handler)

updater.start_polling()
