-- ----------------------------
-- Table structure for `sz_admin`
-- ----------------------------
DROP TABLE IF EXISTS `sz_admin`;
CREATE TABLE `sz_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `name` varchar(25) CHARACTER SET utf8 NOT NULL COMMENT '管理员登陆名',
  `password` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '登陆密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sz_admin
-- ----------------------------
INSERT INTO `sz_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for `sz_article`
-- ----------------------------
DROP TABLE IF EXISTS `sz_article`;
CREATE TABLE `sz_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '文章标题',
  `cate` int(11) NOT NULL COMMENT '分类id',
  `description` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '文章描述',
  `content` text CHARACTER SET utf8 NOT NULL COMMENT '文章详细内容',
  `time` int(11) NOT NULL COMMENT '增加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sz_article
-- ----------------------------
INSERT INTO `sz_article` VALUES ('2', 'SDAFSDF文章标题', '2', 'SDFASDFSD文章标题', 'SDFASDFASDF文章标题', '1442470153');
INSERT INTO `sz_article` VALUES ('4', 'dgsdfsd文章描述fasdf', '4', 'SD文章描述FASDFa', 'sdfasd文章内容fasdfsdfasdfasd', '1442473377');
INSERT INTO `sz_article` VALUES ('5', '文章标题', '3', '文章描述', '文章内容文章内容文章内容文章内容', '1442478775');

-- ----------------------------
-- Table structure for `sz_cate`
-- ----------------------------
DROP TABLE IF EXISTS `sz_cate`;
CREATE TABLE `sz_cate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `cate` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sz_cate
-- ----------------------------
INSERT INTO `sz_cate` VALUES ('1', '好的');
INSERT INTO `sz_cate` VALUES ('2', '测试2');
INSERT INTO `sz_cate` VALUES ('3', '测试33333333');
INSERT INTO `sz_cate` VALUES ('4', '最后增加测试的分类');

-- ----------------------------
-- Table structure for `sz_comment`
-- ----------------------------
DROP TABLE IF EXISTS `sz_comment`;
CREATE TABLE `sz_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章评论id',
  `comment` text CHARACTER SET utf8 NOT NULL COMMENT '评论内容',
  `comment_time` int(11) NOT NULL COMMENT '评论时间',
  `article_id` int(11) NOT NULL COMMENT '文章对应的id',
  `user_name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '评论用户',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sz_comment
-- ----------------------------
INSERT INTO `sz_comment` VALUES ('1', 'sadfsdfas', '0', '2', '33333');
INSERT INTO `sz_comment` VALUES ('9', '林远龙林远龙林远龙林远龙', '1442476885', '2', '林远龙');
INSERT INTO `sz_comment` VALUES ('10', '这是我的评论 内容 ', '1442478331', '2', '林小二');