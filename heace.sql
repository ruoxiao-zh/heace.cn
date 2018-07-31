/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : heace

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-07-31 17:57:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate` varchar(11) NOT NULL DEFAULT '0' COMMENT '文章分类',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '文章标题',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '文章图片',
  `content` text NOT NULL COMMENT '文章内容',
  `is_top` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '文章置顶(0: 不置顶 1: 置顶)',
  `is_index` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐首页(0: 不推荐 1: 推荐)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', '行业动态', '什么是 N+1 问题，以及如何解决 Laravel 的 N+1 问题？', '/uploads/images/articles/201807/21/1532185749_xAoalhNe54.png', '对象关系映射（ORM）使得处理数据库非常简单。 虽然以面向对象的方式定义数据库关系使得查询相关模型数据变得容易，但开发人员可能不会关注底层数据库调用。\n\n对 ORM 一个标准的数据库优化是预加载相关数据。我们将建立一些关系示例，然后逐步了解查询随着预加载和不加载如何变化。我喜欢直接使用代码来验证，我希望通过一些示例说明预加载如何实现从而进一步帮助您了解如何优化查询。\n\n介绍\n在基本级别，ORM 是 “懒惰” 加载相关的模型数据。但是，ORM 应该如何知道你的意图？在查询模型后，您可能永远不会真正使用相关模型的数据。不优化查询被称为 “N + 1” 问题。当您使用对象来表示查询时，您可能在不知情的情况下进行查询。\n\n想象一下，您收到了100个来自数据库的对象，并且每条记录都有1个关联的模型（即belongsTo）。使用ORM默认会产生101条查询; 对原始100条记录 进行一次查询，如果访问了模型对象上的相关数据，则对每条记录进行附加查询。在伪代码中，假设您要列出所有已发布帖子的发布作者。从一组帖子（每个帖子有一位作者），您可以得到一个作者姓名列表，如下所示：', '1', '0', '2018-07-31 11:15:48', '2018-07-31 11:19:51');
INSERT INTO `articles` VALUES ('2', '行业动态', '干货！手把手教你写 SDK ！', '/uploads/images/articles/201807/21/1532185749_xAoalhNe54.png', '本人 SDK 写过不少，有些还没有推广只是出于公司自用的状态，也总结了不少经验，这次准备写个美团配送的 SDK，想着不如就把开发过程写成文章吧！\n\n首先要了解一个精华包 https://github.com/hanson/foundation-sdk ,有多精华？本人所有的 SDK 只需要依赖这一个包，足矣。\n\n此包含括容器、日志、请求、配置、token 等基础类，这里并不打算细讲，到时另开文章细讲。\n\n开发准备\n先来看看此次教程要开发的美团配送文档 http://page.peisong.meituan.com/open/doc#section1-1\n\n一般我会首先给 SDK 划分模块，用 easyWeChat 举例子就是 $wechat->server $wechat->card 等等，那这里其实就只有一个 order ，那么我也没有什么必要去弄个容器了，毕竟只有一个。\n\n我们来看 API 列表，其实也就这么几个 API，但为了效果更好看，我们会把调用的类独立出来', '0', '0', '2018-07-31 11:20:40', '2018-07-31 11:20:40');
INSERT INTO `articles` VALUES ('3', '行业动态', 'View 发布 3.0 版本，以及开发者社区等 5 款新产品', '/uploads/images/articles/201807/21/1532185749_xAoalhNe54.png', '为庆祝 iView 两周岁生日，以及 3.0 版本的发布，我们在 iView 文档 中放置了三枚彩蛋，它们埋藏在不同的页面里，可能是一段隐藏的代码，或是一段需要破解的密码等等，总之，聪明的你一定会找到并破译它们。当然，找到三枚彩蛋，你并不能继承 iView 作者的遗产！彩蛋可以兑换大量的 IO 币，详见下文开发者社区。\n\n设计\n许多用户选择 iView，很大的原因是认可 iView 的设计，所以在 iView 3.0 里，我们对 UI 进行了进一步的优化。\n\niView 的 icon 采用开源项目 ionicons 提供的图标，这次也是将 ionicons 图标库从 2.0 升级至 3.0。\n3.0 的图标库在命名上更加的规范，只分为 ios ,md, logo 三种，图标也比以前丰富和好看。\n3.0 还新增了属性 custom，可以自定义图标。', '0', '0', '2018-07-31 11:22:10', '2018-07-31 11:22:10');

-- ----------------------------
-- Table structure for links
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL COMMENT '友情链接url',
  `name` varchar(255) NOT NULL COMMENT '友情链接名称',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of links
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '用户名',
  `avatar` varchar(255) DEFAULT NULL COMMENT '用户头像',
  `email` varchar(255) DEFAULT NULL COMMENT '密码',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', null, 'admin@163.com', '$2y$10$SO9/TMGv3l3hcYB3IBKY3Op0WcPMpkJUlY8qXPNXc4OoP9uenYsrC', null, '2018-07-31 10:57:06', '2018-07-31 10:57:06');
