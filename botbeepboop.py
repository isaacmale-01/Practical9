import discord
import os
from dotenv import load_dotenv

client = discord.Client()

load_dotenv()
TOKEN = os.getenv('TOKEN')

@client.event
async def on_message(message):
    if message.author == client.user:
        return

    if message.content.startswith('$hello'):
        await message.channel.send("Hello Sunshine!")

    if message.content == '$private':
        await message.author.send("Hello Treacle!")

@client.event
async def on_connect():
    print("Bot now connected to the server!")

client.run('OTUxOTA3MjQ0NzA5MTMwMzAw.YiuStA.dxQj-dQaSdOCILLS58wc7_GbU3w')

