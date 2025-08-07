---
title: 'Guide'
layout: '~/layouts/MarkdownLayout.astro'
---
## 最佳实践

### 链接设置

* 如媒体服务Plex、Emby、Jelly、Subsonic直接添加链接，格式 http//:xxx.xxx.com 如果有端口 http//:xxx.xxx.com:端口
* 如果是webdav，格式 http//:xxx.xxx.com 如果有端口 http//:xxx.xxx.com:端口，对于webdav，可以直接在链接内添加文件路径，达到扫描指定目录 如http//:xxx.xxx.com:端口/Music 以扫描Music下的内容

### 目录设置

* 网盘默认4层文件夹扫描，主要是避免网盘文件夹层次过多造成的扫描耗时太长。
* 不指定文件夹直接默认从网盘根目录扫描。
* 可指定文件夹，提高歌曲文件扫描速度。指定文件夹格式如 /music，就会从网盘的music文件夹下开始扫描。 如/music/like 就会从/music/like文件夹开始扫描

### 歌曲信息扫描包括两种方式

#### 方式一：读取文件名解析

* 专辑名文件夹: 专辑名-歌手  
* 专辑封面图: 歌曲图片和专辑封面用同一张，放在专辑文件夹下命名为cover.png(jpg)  
* 歌手封面：新建artist文件夹，命名为歌手名.png(jpg)，没有设置app也会联网在互联网扫描歌手封面。
* **歌曲文件名**: （重要）
  * 默认解析规则是直接将文件名作为歌曲名; 
  * 可以在新增歌曲源的时候自定义解析规则， track表示编号、name表示歌曲名、artist表示歌手名，这三个词是固定词语，其中name是必须包含的。
    * 比如文件名称是 快乐崇拜.mp3 ， 解析规则填  name  。
    * 比如文件名字是 快乐崇拜-潘玮柏.mp3 ， 解析规则可以填  name-artist 。
    * 比如文件名字是 快乐崇拜_潘玮柏.mp3 ， 解析规则可以填  name_artist 。
    * 比如文件名字是 1-快乐崇拜-潘玮柏.mp3 ，解析规则可以填  track-name-artist 。
    * 比如文件名字是 1-快乐崇拜.mp3，解析规则可以填 track-name 。
  * 由于修改歌手名字工作量很大，如过没有歌手名直接默认使用专辑歌手名;
* 歌词: 保存在歌曲同一个目录，与歌曲文件名需要保持一致，文件格式是lrc 

![image](~/assets/images/file_folder_design2.webp)

#### 方式二：读取文件内嵌信息解析

从歌曲文件中读取歌曲信息，因为歌曲协议支持将歌曲信息保存在文件内容中，所以可以读取文件内容解析到歌曲信息。  
这种方式需要保证歌曲内的信息标签都被填充。  对于部分云盘如Onedrive云盘会帮忙自动解析歌曲标签信息，所以在同步歌曲的时候可以直接使用，其他源的话需要等播放歌曲时才会下载文件读取标签信息。 
推荐使用工具给歌曲文件打上信息标签: [picard](https://picard.musicbrainz.org/)  
[使用教程](http://www.92nas.com/forum.php?mod=viewthread&tid=115)

### 本地手机歌曲

遵循Android官方规范。 Android系统会自动使用方式二识别整理歌曲生成数据。

**所有文件改动后需要在app歌曲源内重新刷新同步数据**
