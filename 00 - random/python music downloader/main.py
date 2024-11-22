# from pytube import YouTube
# YouTube('https://www.youtube.com/watch?v=UtF6Jej8yb4').streams.first().download()
# yt = YouTube('http://youtube.com/watch?v=9bZkp7q19f0')
# yt.streams.filter(progressive=True, file_extension='mp4').order_by('resolution').desc().first().download()


# from pytube import YouTube
# YouTube('https://www.youtube.com/watch?v=UtF6Jej8yb4').streams.first().download()



import yt_dlp

# URL do vídeo do YouTube
video_url = 'https://www.youtube.com/watch?v=UtF6Jej8yb4'

# Opções para baixar o áudio
ydl_opts = {
    'format': 'bestaudio/best',
    'postprocessors': [{
        'key': 'FFmpegExtractAudio',
        'preferredcodec': 'mp3',
        'preferredquality': '192',
    }],
}

with yt_dlp.YoutubeDL(ydl_opts) as ydl:
    ydl.download([video_url])
