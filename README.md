# Pour

#### 介绍

实用型PHP库，包括针对Laravel/Lumen，ORM，GuzzleHttp以及源生PHP7+的扩展支持。在原有的基础上进行增强抽象，更加轻便的封装方式使构建代码更加高效。现独立出来方便自己在多个项目中使用同一套类库，同样也提供给有需要的同学。

#### 安装

```composer require famio/pour```

#### 说明

###### 文件夹&文件

---

```/src/Base``` 为加强原生使用体验的类库。

```/src/Base/Network.php``` 与网络（请求）相关操作的类库。

```/src/Base/SystemInfo.php``` 与服务器本地相关操作的类库。

```/src/Base/Time.php``` 与时间处理相关操作的类库。

```/src/Base/Uni.php``` 通用型操作、字符串处理的类库。

---

```/src/Plus``` 为加强其它框架类组件而特定开发的类库，比如针对Laravel-Admin、GuzzleHttp的类库。

```/src/Plus/GuzzleHttp.php``` 加强GuzzleHttp组件使用性的类库。

```/src/Plus/LaravelAdmin.php``` 加强Laravel-Admin框架使用性的类库。

```/src/Plus/Wechat.php``` 与微信公众平台相关接口的类库。

---

#### 参与贡献

1. Fork 本仓库
2. 新建 Feat_xxx 分支
3. 提交代码
4. 新建 Pull Request

#### 开源协议

Pour 遵循 MIT 开源协议。