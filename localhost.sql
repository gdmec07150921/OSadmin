-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2016-12-27 10:05:17
-- 服务器版本： 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course`
--
CREATE DATABASE IF NOT EXISTS `course` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `course`;

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE `course` (
  `course_id` varchar(50) NOT NULL COMMENT '课程编号',
  `course_name` varchar(50) NOT NULL COMMENT '课程名称',
  `course_num` int(10) NOT NULL COMMENT '课程人数',
  `course_num1` int(10) NOT NULL COMMENT '已选人数',
  `course_num2` int(10) NOT NULL COMMENT '剩余人数',
  `course_state` int(2) NOT NULL COMMENT '课程状态(1,在选  2,已满  3,未开 4,正常 5,停课 ）',
  `course_where` int(2) NOT NULL COMMENT '课程地点(1, 堂	2，在线）',
  `course_like` int(10) NOT NULL COMMENT '喜爱人数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='课程列表';

--
-- 转存表中的数据 `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_num`, `course_num1`, `course_num2`, `course_state`, `course_where`, `course_like`) VALUES
('01', 'JavaScript', 50, 0, 50, 1, 1, 100),
('10', 'php', 50, 10, 40, 1, 1, 50),
('11111', 'java', 50, 50, 0, 2, 1, 100),
('2', 'php', 50, 10, 40, 2, 2, 50),
('222222', 'java', 50, 50, 0, 1, 1, 100),
('3', 'php', 50, 10, 40, 1, 1, 50),
('30', 'php', 50, 10, 40, 1, 1, 50),
('4', 'php', 50, 10, 40, 1, 1, 50),
('40', 'php', 50, 10, 40, 1, 1, 50);

-- --------------------------------------------------------

--
-- 表的结构 `details`
--

CREATE TABLE `details` (
  `details_course_id` varchar(50) NOT NULL COMMENT '课程编号',
  `details_course_name` varchar(50) NOT NULL COMMENT '课程名称',
  `details_teacher` varchar(20) NOT NULL COMMENT '课程老师',
  `details_hour` int(10) NOT NULL COMMENT '课时',
  `details_where` varchar(20) NOT NULL COMMENT '上课地点',
  `details_time` varchar(50) NOT NULL COMMENT '上课时间',
  `details_course_state` int(2) NOT NULL COMMENT '课程状态(1,在选  2,已满  3,未开 4,正常 5,停课 ）',
  `details_summary` varchar(200) NOT NULL COMMENT '课程概述',
  `details_evaluate` varchar(200) NOT NULL COMMENT '课程评价',
  `course_url` varchar(50) NOT NULL COMMENT '课程图片',
  `teacher_url` varchar(50) NOT NULL COMMENT '老师头像'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='课程详情';

--
-- 转存表中的数据 `details`
--

INSERT INTO `details` (`details_course_id`, `details_course_name`, `details_teacher`, `details_hour`, `details_where`, `details_time`, `details_course_state`, `details_summary`, `details_evaluate`, `course_url`, `teacher_url`) VALUES
('01', 'JavaScript', '陈鹏123', 60, 'www.baidu.com', '1-16周', 1, 'js', '好', '/js.jpg', '/js_t.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `evaluate`
--

CREATE TABLE `evaluate` (
  `id` int(20) NOT NULL COMMENT '编号',
  `evaluate_course_id` varchar(50) NOT NULL COMMENT '课程编号',
  `evaluate_course_name` varchar(50) NOT NULL COMMENT '课程名称',
  `evaluate_user_name` varchar(50) NOT NULL COMMENT '评价人',
  `evaluate_content` varchar(200) NOT NULL COMMENT '评价内容',
  `evaluate_time` date NOT NULL COMMENT '评价时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT=' 课程评价';

--
-- 转存表中的数据 `evaluate`
--

INSERT INTO `evaluate` (`id`, `evaluate_course_id`, `evaluate_course_name`, `evaluate_user_name`, `evaluate_content`, `evaluate_time`) VALUES
(1, '01', 'JavaScript', '卡卡西', '好', '2016-12-19'),
(2, '01', 'JavaScript', '夕日红', '啊啊啊啊啊', '2016-12-23'),
(3, '2', 'php', '左助', '啊啊啊啊啊啊啊啊', '2016-12-01');

-- --------------------------------------------------------

--
-- 表的结构 `feedback`
--

CREATE TABLE `feedback` (
  `feedback_no` int(10) NOT NULL COMMENT '反馈编号',
  `feedback_course_name` varchar(50) NOT NULL COMMENT '课程名称',
  `feedback_question` varchar(200) NOT NULL COMMENT '反馈问题',
  `feedback_answer` varchar(200) NOT NULL COMMENT '反馈回复',
  `feedback_state` int(10) NOT NULL COMMENT '状态(1,未回复  2，已回复）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='课程反馈';

--
-- 转存表中的数据 `feedback`
--

INSERT INTO `feedback` (`feedback_no`, `feedback_course_name`, `feedback_question`, `feedback_answer`, `feedback_state`) VALUES
(1, 'JavaScript', 'haha', 'haha', 2);

-- --------------------------------------------------------

--
-- 表的结构 `mine`
--

CREATE TABLE `mine` (
  `mine_user_id` int(11) NOT NULL COMMENT '用户ID',
  `mine_user_name` varchar(20) NOT NULL COMMENT '用户名称',
  `mine_course_id` varchar(50) NOT NULL COMMENT '课程编号',
  `mine_course_name` varchar(50) NOT NULL COMMENT '课程名称',
  `mine_details_hour` int(10) NOT NULL COMMENT '课时',
  `mine_hour` int(10) NOT NULL COMMENT '已完成课时',
  `course_work` int(10) NOT NULL COMMENT '作业次数',
  `mine_work` int(10) NOT NULL COMMENT '我的作业次数',
  `mine_course_state` int(10) NOT NULL COMMENT '课程状态(1,在选  2,已满  3,未开 4,正常 5,停课 ）',
  `mine_check` int(10) NOT NULL COMMENT '缺勤次数',
  `mine_id` int(11) NOT NULL COMMENT '编号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='我的课程';

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE `question` (
  `question_no` int(10) NOT NULL COMMENT '问题编号',
  `question_course_name` varchar(50) NOT NULL COMMENT '课程名称',
  `question_name` varchar(200) NOT NULL COMMENT '问题',
  `question_answer` varchar(200) NOT NULL COMMENT '回答',
  `question_state` int(10) NOT NULL COMMENT '状态(1,未回复  2，已回复）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='课程提问';

--
-- 转存表中的数据 `question`
--

INSERT INTO `question` (`question_no`, `question_course_name`, `question_name`, `question_answer`, `question_state`) VALUES
(1, 'JavaScript', '哈哈', '哈哈', 2);

-- --------------------------------------------------------

--
-- 表的结构 `stuinf`
--

CREATE TABLE `stuinf` (
  `xh` int(11) NOT NULL,
  `xm` varchar(10) NOT NULL,
  `sex` int(1) NOT NULL DEFAULT '0' COMMENT '男：0 女：1',
  `class` varchar(10) NOT NULL,
  `major` varchar(20) NOT NULL COMMENT '专业',
  `st_url` varchar(50) NOT NULL COMMENT '学生头像',
  `password` varchar(50) NOT NULL DEFAULT '123456' COMMENT '登录密码',
  `phone` varchar(20) NOT NULL COMMENT '手机'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生表';

--
-- 转存表中的数据 `stuinf`
--

INSERT INTO `stuinf` (`xh`, `xm`, `sex`, `class`, `major`, `st_url`, `password`, `phone`) VALUES
(111, '匿名', 0, '', '', '', '123456', ''),
(7160601, '卡卡西', 0, '1606', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160602, '卡普', 0, '1606', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160603, '战国', 0, '1606', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160604, '青雉', 0, '1606', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160605, '爱德华纽盖特', 0, '1606', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160701, '香克斯', 0, '1607', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160702, '波风水门', 0, '1607', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160703, '纲手', 0, '1607', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160704, '大筒木辉夜', 0, '1607', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160705, '漩涡玖辛奈', 1, '1607', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160801, '夕日红', 1, '1608', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160802, '鹰眼米霍克', 0, '1608', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160803, '鸣人', 0, '1608', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160804, '小樱', 1, '1608', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160805, '左助', 0, '1608', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160901, '蒙奇D路飞', 0, '1609', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160902, '娜美', 1, '1609', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160903, '山治', 0, '1609', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160904, '索隆', 0, '1609', '软件设计', '/st.jpg', '123456', '13075695603'),
(7160905, '罗宾', 1, '1609', '软件设计', '/st.jpg', '123456', '13075695603');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_name` (`course_name`),
  ADD KEY `course_state` (`course_state`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`details_course_id`),
  ADD KEY `details_course_state` (`details_course_state`),
  ADD KEY `details_hour` (`details_hour`),
  ADD KEY `details_course_name` (`details_course_name`);

--
-- Indexes for table `evaluate`
--
ALTER TABLE `evaluate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluate_user_name` (`evaluate_user_name`),
  ADD KEY `evaluate_course_name` (`evaluate_course_name`),
  ADD KEY `evaluate_course_id` (`evaluate_course_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_no`),
  ADD KEY `feedback_course_name` (`feedback_course_name`);

--
-- Indexes for table `mine`
--
ALTER TABLE `mine`
  ADD PRIMARY KEY (`mine_id`),
  ADD KEY `course_name` (`mine_course_name`),
  ADD KEY `course_id` (`mine_course_id`),
  ADD KEY `course_id_2` (`mine_course_id`),
  ADD KEY `user_id` (`mine_user_id`),
  ADD KEY `user_name` (`mine_user_name`),
  ADD KEY `mine_course_state` (`mine_course_state`),
  ADD KEY `mine_details_hour` (`mine_details_hour`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_no`),
  ADD KEY `question_course_name` (`question_course_name`);

--
-- Indexes for table `stuinf`
--
ALTER TABLE `stuinf`
  ADD PRIMARY KEY (`xh`),
  ADD KEY `xm` (`xm`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `evaluate`
--
ALTER TABLE `evaluate`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT COMMENT '编号', AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_no` int(10) NOT NULL AUTO_INCREMENT COMMENT '反馈编号', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `mine`
--
ALTER TABLE `mine`
  MODIFY `mine_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号';
--
-- 使用表AUTO_INCREMENT `question`
--
ALTER TABLE `question`
  MODIFY `question_no` int(10) NOT NULL AUTO_INCREMENT COMMENT '问题编号', AUTO_INCREMENT=2;
--
-- 限制导出的表
--

--
-- 限制表 `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`details_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `details_ibfk_3` FOREIGN KEY (`details_course_state`) REFERENCES `course` (`course_state`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `details_ibfk_4` FOREIGN KEY (`details_course_name`) REFERENCES `course` (`course_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `evaluate`
--
ALTER TABLE `evaluate`
  ADD CONSTRAINT `evaluate_ibfk_1` FOREIGN KEY (`evaluate_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluate_ibfk_4` FOREIGN KEY (`evaluate_user_name`) REFERENCES `stuinf` (`xm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluate_ibfk_5` FOREIGN KEY (`evaluate_course_name`) REFERENCES `course` (`course_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`feedback_course_name`) REFERENCES `course` (`course_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `mine`
--
ALTER TABLE `mine`
  ADD CONSTRAINT `mine_ibfk_2` FOREIGN KEY (`mine_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mine_ibfk_4` FOREIGN KEY (`mine_course_state`) REFERENCES `course` (`course_state`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mine_ibfk_7` FOREIGN KEY (`mine_user_id`) REFERENCES `stuinf` (`xh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mine_ibfk_8` FOREIGN KEY (`mine_course_name`) REFERENCES `course` (`course_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mine_ibfk_9` FOREIGN KEY (`mine_details_hour`) REFERENCES `details` (`details_hour`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`question_course_name`) REFERENCES `course` (`course_name`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `course1`
--
CREATE DATABASE IF NOT EXISTS `course1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `course1`;

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE `class` (
  `class_id` int(10) NOT NULL COMMENT '编号',
  `class_num` varchar(10) NOT NULL COMMENT '班级号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`class_id`, `class_num`) VALUES
(1, '1501'),
(2, '1502'),
(3, '1503'),
(4, '1504'),
(5, '1505'),
(6, '1506'),
(7, '1507'),
(8, '1508'),
(9, '1509'),
(10, '1510');

-- --------------------------------------------------------

--
-- 表的结构 `collection`
--

CREATE TABLE `collection` (
  `student_id` varchar(20) NOT NULL,
  `course_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `collection`
--

INSERT INTO `collection` (`student_id`, `course_id`) VALUES
('07150907', '002'),
('07150921', '002'),
('07150932', '002'),
('07150910', '003'),
('07150935', '003');

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE `course` (
  `course_id` varchar(50) NOT NULL COMMENT '课程编号',
  `course_name` varchar(50) NOT NULL COMMENT '课程名称',
  `course_summary` varchar(500) DEFAULT NULL COMMENT '课程概述',
  `people` varchar(50) DEFAULT NULL COMMENT '适合人群',
  `course_url` varchar(100) DEFAULT NULL COMMENT '课程图片URL',
  `t_id` varchar(20) DEFAULT NULL COMMENT '任课老师编号',
  `course_hour` int(10) DEFAULT NULL COMMENT '课时',
  `course_task` int(10) NOT NULL DEFAULT '10' COMMENT '作业总次数',
  `course_place` varchar(50) DEFAULT NULL COMMENT '上课地点',
  `course_open` date DEFAULT NULL COMMENT '开课时间',
  `course_time` varchar(50) DEFAULT NULL COMMENT '课程安排',
  `week` varchar(20) NOT NULL DEFAULT '1-16周' COMMENT '周数',
  `course_num` int(10) NOT NULL DEFAULT '50' COMMENT '课程人数',
  `course_num1` int(10) NOT NULL DEFAULT '0' COMMENT '已选人数',
  `course_num2` int(10) NOT NULL DEFAULT '50' COMMENT '剩余人数',
  `course_state` varchar(20) NOT NULL DEFAULT '在选' COMMENT '课程状态（在选，已满，未开，正常，停课）',
  `course_where` varchar(20) NOT NULL DEFAULT '在线' COMMENT '上课方式（教室，在线）',
  `course_star` int(1) NOT NULL DEFAULT '0' COMMENT '课程星数',
  `course_like` int(10) NOT NULL DEFAULT '0' COMMENT '喜爱人数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_summary`, `people`, `course_url`, `t_id`, `course_hour`, `course_task`, `course_place`, `course_open`, `course_time`, `week`, `course_num`, `course_num1`, `course_num2`, `course_state`, `course_where`, `course_star`, `course_like`) VALUES
('001', 'Java', '11', '初学者', 'img', '1503', 60, 10, '图文305', '2016-12-01', '周一34节', '1-16周', 50, 50, 0, '已满', '教室', 1, 2),
('002', '计算机绘图', '用电脑软件画图', '有电脑知识基础的', 'images/CourseImages/1.jpg', '1502', 64, 10, '电子楼305', '2016-12-14', '周二3,4节，周五，7,8节', '1-16周', 50, 0, 50, '在选', '在线', 0, 0),
('003', 'JavaScript', '制作网页', '大学生', 'images/CourseImages/js.jpg', '1503', 60, 10, '图文楼306', '2016-12-21', '周二，3,4节，周五3,4节', '1-16周', 50, 0, 50, '在选', '在线', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `evaluate`
--

CREATE TABLE `evaluate` (
  `id` int(11) NOT NULL COMMENT '编号',
  `course_id` varchar(50) NOT NULL COMMENT '课程编号',
  `student_id` varchar(20) NOT NULL COMMENT '学生学号',
  `evaluate_content` varchar(500) NOT NULL COMMENT '评价内容',
  `evaluate_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评价时间',
  `evaluate_star` int(1) NOT NULL DEFAULT '1' COMMENT '星数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 触发器 `evaluate`
--
DELIMITER $$
CREATE TRIGGER `star` AFTER INSERT ON `evaluate` FOR EACH ROW BEGIN 
    SET @SUM=(select sum(evaluate_star) from evaluate where course_id=new.course_id);
    SET @count=(select count(*) from evaluate where course_id=new.course_id);
    SET @star=(@SUM/@count);
    UPDATE course SET course_star = @star WHERE course_id = NEW.course_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `feedback`
--

CREATE TABLE `feedback` (
  `feedback_no` int(10) NOT NULL COMMENT '编号',
  `course_id` varchar(50) NOT NULL COMMENT '课程编号',
  `student_id` varchar(20) NOT NULL COMMENT '学生学号',
  `feedback_name` varchar(500) NOT NULL COMMENT '反馈',
  `feedback_answer` varchar(500) NOT NULL DEFAULT '  ' COMMENT '回复',
  `feedback_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间',
  `feedback_state` varchar(20) NOT NULL DEFAULT '未回复' COMMENT '状态（未回复，已回复）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `majob`
--

CREATE TABLE `majob` (
  `m_id` int(10) NOT NULL,
  `m_name` varchar(20) NOT NULL COMMENT '专业名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `majob`
--

INSERT INTO `majob` (`m_id`, `m_name`) VALUES
(6, '临床医学'),
(4, '土木工程'),
(3, '外语商务'),
(2, '广告设计'),
(5, '护理学'),
(7, '统计学'),
(8, '计算机维修'),
(1, '软件技术');

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE `question` (
  `question_no` int(10) NOT NULL COMMENT '编号',
  `course_id` varchar(50) NOT NULL COMMENT '课程编号',
  `student_id` varchar(20) NOT NULL COMMENT '学生学号',
  `question_name` varchar(500) NOT NULL COMMENT '问题',
  `question_answer` varchar(500) NOT NULL DEFAULT ' ' COMMENT '回答',
  `question_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间',
  `question_state` varchar(20) NOT NULL DEFAULT '未回复' COMMENT '状态（未回复，已回复）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `schedule`
--

CREATE TABLE `schedule` (
  `s_id` varchar(20) NOT NULL COMMENT '学号',
  `c_id` varchar(20) NOT NULL COMMENT '课程编号',
  `ytime` int(2) NOT NULL DEFAULT '0' COMMENT '已完成课时',
  `ytask` int(2) NOT NULL DEFAULT '0' COMMENT '为完成课时',
  `absence` int(2) NOT NULL DEFAULT '0' COMMENT '缺勤次数',
  `state` varchar(20) NOT NULL DEFAULT '待学习' COMMENT '状态（在学习，待学习，待考核，待评价）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `schedule`
--

INSERT INTO `schedule` (`s_id`, `c_id`, `ytime`, `ytask`, `absence`, `state`) VALUES
('07150907', '002', 0, 0, 0, '待学习');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `s_id` varchar(20) NOT NULL COMMENT '学号',
  `s_name` varchar(20) NOT NULL COMMENT '姓名',
  `introduce` varchar(500) NOT NULL COMMENT '个人简介',
  `sex` char(2) NOT NULL COMMENT '性别',
  `majob` varchar(20) NOT NULL COMMENT '专业',
  `s_url` varchar(100) NOT NULL COMMENT '头像地址',
  `classNo` varchar(20) NOT NULL COMMENT '班级',
  `pwd` varchar(20) NOT NULL DEFAULT '123456' COMMENT '密码',
  `phone` varchar(20) NOT NULL DEFAULT '12345678900' COMMENT '手机号码',
  `integral` int(10) NOT NULL DEFAULT '0' COMMENT '积分'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `introduce`, `sex`, `majob`, `s_url`, `classNo`, `pwd`, `phone`, `integral`) VALUES
('07150907', '陈子浩', '我是女生，漂亮的女生', '女', '软件技术', 'images/StudentImages/czh.jpg', '1509', '123456', '12345678900', 0),
('07150910', '傅锡火', '无聊无聊', '男', '软件技术', 'images/StudentImages/fxh.jpg', '1509', '123456', '12345678900', 0),
('07150921', '黄英泰', '我是男生，漂亮的男生', '女', '广告设计', 'images/StudentImages/hyt.jpg', '1507', '123456', '12345678900', 0),
('07150932', '林雨明', '我是男生，逗逗的男生', '女', '护理学', 'images/StudentImages/lym.png', '1505', '123456', '12345678900', 0),
('07150935', '马志斌', '我是男生，蠢蠢的男生', '女', '广告设计', 'images/StudentImages/mzb.jpeg', '1505', '123456', '12345678900', 0),
('07150936', '谭金辉', '我是男生，傻傻的男生', '男', '外语商务', 'images/StudentImages/tjh.jpg', '1501', '123456', '12345678900', 0);

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE `teacher` (
  `t_id` varchar(20) NOT NULL COMMENT '老师编号',
  `t_name` varchar(20) NOT NULL COMMENT '老师名称',
  `t_sex` char(2) NOT NULL COMMENT '老师性别',
  `t_introduce` varchar(500) NOT NULL COMMENT '老师简介',
  `t_url` varchar(100) NOT NULL COMMENT '老师头像URL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `t_sex`, `t_introduce`, `t_url`) VALUES
('1501', '潘必超', '男', '我是一个好老师', 'img'),
('1502', '潘小超', '男', '我是一个好老师', 'img'),
('1503', '陈鹏', '女', '我是一个I好老师', 'img');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `name` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`name`, `pwd`) VALUES
('admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_num` (`class_num`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`student_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `evaluate`
--
ALTER TABLE `evaluate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_no`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `majob`
--
ALTER TABLE `majob`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `m_name` (`m_name`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_no`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`s_id`,`c_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`name`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '编号', AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `evaluate`
--
ALTER TABLE `evaluate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号', AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_no` int(10) NOT NULL AUTO_INCREMENT COMMENT '编号', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `majob`
--
ALTER TABLE `majob`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `question`
--
ALTER TABLE `question`
  MODIFY `question_no` int(10) NOT NULL AUTO_INCREMENT COMMENT '编号', AUTO_INCREMENT=3;
--
-- 限制导出的表
--

--
-- 限制表 `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `collection_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `evaluate`
--
ALTER TABLE `evaluate`
  ADD CONSTRAINT `evaluate_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluate_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `osadmin`
--
CREATE DATABASE IF NOT EXISTS `osadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `osadmin`;

-- --------------------------------------------------------

--
-- 表的结构 `osa_menu_url`
--

CREATE TABLE `osa_menu_url` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_url` varchar(255) NOT NULL,
  `module_id` int(11) NOT NULL,
  `is_show` tinyint(4) NOT NULL COMMENT '是否在sidebar里出现',
  `online` int(11) NOT NULL DEFAULT '1' COMMENT '在线状态，还是下线状态，即可用，不可用。',
  `shortcut_allowed` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT '是否允许快捷访问',
  `menu_desc` varchar(255) DEFAULT NULL,
  `father_menu` int(11) NOT NULL DEFAULT '0' COMMENT '上一级菜单'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='功能链接（菜单链接）';

--
-- 转存表中的数据 `osa_menu_url`
--

INSERT INTO `osa_menu_url` (`menu_id`, `menu_name`, `menu_url`, `module_id`, `is_show`, `online`, `shortcut_allowed`, `menu_desc`, `father_menu`) VALUES
(1, '首页', '/panel/index.php', 1, 0, 1, 1, '后台首页', 0),
(2, '账号列表', '/panel/users.php', 1, 1, 1, 1, '账号列表', 0),
(3, '修改账号', '/panel/user_modify.php', 1, 0, 1, 0, '修改账号', 2),
(4, '新建账号', '/panel/user_add.php', 1, 0, 1, 1, '新建账号', 2),
(5, '个人信息', '/panel/profile.php', 1, 0, 1, 1, '个人信息', 0),
(6, '账号组成员', '/panel/group.php', 1, 0, 1, 0, '显示账号组详情及该组成员', 7),
(7, '账号组管理', '/panel/groups.php', 1, 1, 1, 1, '增加管理员', 0),
(8, '修改账号组', '/panel/group_modify.php', 1, 0, 1, 0, '修改账号组', 7),
(9, '新建账号组', '/panel/group_add.php', 1, 0, 1, 1, '新建账号组', 7),
(10, '权限管理', '/panel/group_role.php', 1, 1, 1, 1, '用户权限依赖于账号组的权限', 0),
(11, '菜单模块', '/panel/modules.php', 1, 1, 1, 1, '菜单里的模块', 0),
(12, '编辑菜单模块', '/panel/module_modify.php', 1, 0, 1, 0, '编辑模块', 11),
(13, '添加菜单模块', '/panel/module_add.php', 1, 0, 1, 1, '添加菜单模块', 11),
(14, '功能列表', '/panel/menus.php', 1, 1, 1, 1, '菜单功能及可访问的链接', 0),
(15, '增加功能', '/panel/menu_add.php', 1, 0, 1, 1, '增加功能', 14),
(16, '功能修改', '/panel/menu_modify.php', 1, 0, 1, 0, '修改功能', 14),
(17, '设置模板', '/panel/set.php', 1, 0, 1, 1, '设置模板', 0),
(18, '便签管理', '/panel/quicknotes.php', 1, 1, 1, 1, 'quick note', 0),
(19, '菜单链接列表', '/panel/module.php', 1, 0, 1, 0, '显示模块详情及该模块下的菜单', 11),
(20, '登入', '/login.php', 1, 0, 1, 1, '登入页面', 0),
(21, '操作记录', '/panel/syslog.php', 1, 1, 1, 1, '用户操作的历史行为', 0),
(22, '系统信息', '/panel/system.php', 1, 1, 1, 1, '显示系统相关信息', 0),
(23, 'ajax访问修改快捷菜单', '/ajax/shortcut.php', 1, 0, 1, 0, 'ajax请求', 0),
(24, '添加便签', '/panel/quicknote_add.php', 1, 0, 1, 1, '添加quicknote的内容', 18),
(25, '修改便签', '/panel/quicknote_modify.php', 1, 0, 1, 0, '修改quicknote的内容', 18),
(26, '系统设置', '/panel/setting.php', 1, 0, 1, 0, '系统设置', 0),
(101, '样例', '/sample/sample.php', 2, 1, 1, 1, '', 0),
(103, '读取XLS文件', '/sample/read_excel.php', 2, 1, 1, 1, '', 0),
(104, '课程列表', '/course/course.php', 3, 1, 1, 1, '课程列表', 0),
(105, '添加课程', '/course/course_add.php', 3, 0, 1, 1, '添加课程', 104),
(106, '修改课程列表', '/course/course_modify.php', 3, 0, 1, 1, '修改课程列表', 104),
(107, '课程详情', '/course/details.php', 3, 1, 1, 1, '课程详情', 0),
(109, '添加课程详情', '/course/details_add.php', 3, 0, 1, 1, '添加课程详情', 107),
(110, '修改课程详情', '/course/details_modify.php', 3, 0, 1, 0, '修改课程详情', 107),
(111, '课程评价', '/course/evaluate.php', 3, 1, 1, 1, '课程评价', 0),
(112, '获取课程名称', '/course/aa.php', 3, 0, 1, 1, '', 0),
(113, '获取老师名称', '/course/bb.php', 3, 0, 1, 1, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `osa_module`
--

CREATE TABLE `osa_module` (
  `module_id` int(11) UNSIGNED NOT NULL,
  `module_name` varchar(50) NOT NULL,
  `module_url` varchar(128) NOT NULL,
  `module_sort` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `module_desc` varchar(255) DEFAULT NULL,
  `module_icon` varchar(32) DEFAULT 'icon-th' COMMENT '菜单模块图标',
  `online` int(11) NOT NULL DEFAULT '1' COMMENT '模块是否在线'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='菜单模块';

--
-- 转存表中的数据 `osa_module`
--

INSERT INTO `osa_module` (`module_id`, `module_name`, `module_url`, `module_sort`, `module_desc`, `module_icon`, `online`) VALUES
(1, '控制面板', '/panel/index.php', 0, '配置OSAdmin的相关功能', 'icon-th', 1),
(2, '样例模块', '/panel/index.php', 1, '样例模块', 'icon-leaf', 1),
(3, '选课系统', '/index.php', 1, '选课系统', 'icon-th', 1);

-- --------------------------------------------------------

--
-- 表的结构 `osa_quick_note`
--

CREATE TABLE `osa_quick_note` (
  `note_id` int(10) UNSIGNED NOT NULL COMMENT 'note_id',
  `note_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `owner_id` int(10) UNSIGNED NOT NULL COMMENT '谁添加的'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用于显示的quick note';

--
-- 转存表中的数据 `osa_quick_note`
--

INSERT INTO `osa_quick_note` (`note_id`, `note_content`, `owner_id`) VALUES
(6, '孔子说：万能的不是神，是程序员！', 1),
(7, '听说飞信被渗透了几百台服务器', 1),
(8, '（yamete）＝不要 ，一般音译为”亚美爹”，正确发音是：亚灭贴', 1),
(9, '（kimochiii）＝爽死了，一般音译为”可莫其”，正确发音是：克一莫其一一 ', 1),
(10, '（itai）＝疼 ，一般音译为以太', 1),
(11, '（iku）＝要出来了 ，一般音译为一库', 1),
(12, '（soko dame）＝那里……不可以 一般音译：锁扩，打灭', 1),
(13, '(hatsukashi)＝羞死人了 ，音译：哈次卡西', 1),
(14, '（atashinookuni）＝到人家的身体里了，音译：啊她西诺喔库你', 1),
(15, '（mottto mottto）＝还要，还要，再大力点的意思 音译：毛掏 毛掏', 1),
(20, '这是一条含HTML的便签 <a href="http://www.osadmin.org">osadmin.org</a>', 1),
(23, '你造吗？quick note可以关掉的，在右上角的我的账号里可以设置的。', 1),
(24, '你造吗？“功能”其实就是“链接”啦啦，权限控制是根据用户访问的链接来验证的。', 1),
(25, '你造吗？权限是赋予给账号组的，账号组下的用户拥有相同的权限。', 1),
(26, 'Hi，你注意到navibar上的+号和-号了吗？', 1),
(27, '假如世界上只剩下两坨屎，我一定会把热的留给你', 1),
(28, '你造吗？这页面设计用是bootstrap模板改的', 1),
(29, '你造吗？这全部都是我一个人开发的，可特么累了', 1),
(30, '客官有什么建议可以直接在weibo.com上<a target=_blank  href ="http://weibo.com/osadmin">@OSAdmin官网</a> 本店服务一定会让客官满意的！亚美爹！', 1);

-- --------------------------------------------------------

--
-- 表的结构 `osa_sys_log`
--

CREATE TABLE `osa_sys_log` (
  `op_id` int(11) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `action` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL COMMENT '操作了哪个类的对象',
  `class_obj` varchar(32) NOT NULL COMMENT '操作的对象是谁，可能为对象的ID',
  `result` text NOT NULL COMMENT '操作的结果',
  `op_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='操作日志表';

--
-- 转存表中的数据 `osa_sys_log`
--

INSERT INTO `osa_sys_log` (`op_id`, `user_name`, `action`, `class_name`, `class_obj`, `result`, `op_time`) VALUES
(1, 'admin', 'LOGIN', 'User', '1', '{"IP":"172.19.145.47"}', 1482387177),
(2, 'admin', 'ADD', 'Module', '3', '{"module_name":"\\u9009\\u8bfe\\u7cfb\\u7edf","module_desc":"\\u9009\\u8bfe\\u7cfb\\u7edf","module_url":"\\/index.php","module_sort":1,"module_icon":"icon-th"}', 1482387243),
(3, 'admin', 'ADD', 'MenuUrl', '104', '{"menu_name":"\\u8bfe\\u7a0b\\u5217\\u8868","menu_url":"\\/course\\/course.php","module_id":"3","is_show":"1","online":1,"menu_desc":"\\u8bfe\\u7a0b\\u5217\\u8868","shortcut_allowed":"1","father_menu":"0"}', 1482387289),
(4, 'admin', 'ADD', 'MenuUrl', '105', '{"menu_name":"\\u6dfb\\u52a0\\u8bfe\\u7a0b","menu_url":"\\/course\\/course_add.php","module_id":"3","is_show":"0","online":1,"menu_desc":"\\u6dfb\\u52a0\\u8bfe\\u7a0b","shortcut_allowed":"1","father_menu":"104"}', 1482387341),
(5, 'admin', 'MODIFY', 'UserGroup', '1', '{"group_role":"1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,101,103,104,105"}', 1482387353),
(6, 'admin', 'LOGIN', 'User', '1', '{"IP":"172.19.145.47"}', 1482387681),
(7, 'admin', 'DELETE', 'course', '20', '{"course_id":"20","course_name":"php","course_num":"50","course_num1":"10","course_num2":"40","course_state":"1","course_where":"1","course_like":"50"}', 1482388998),
(8, 'admin', 'DELETE', 'course', '60', '{"course_id":"60","course_name":"php","course_num":"50","course_num1":"10","course_num2":"40","course_state":"1","course_where":"1","course_like":"50"}', 1482389022),
(9, 'admin', 'DELETE', 'course', '50', '{"course_id":"50","course_name":"php","course_num":"50","course_num1":"10","course_num2":"40","course_state":"1","course_where":"1","course_like":"50"}', 1482389450),
(10, 'admin', 'ADD', 'MenuUrl', '106', '{"menu_name":"\\u4fee\\u6539\\u8bfe\\u7a0b\\u5217\\u8868","menu_url":"\\/course\\/course_modify.php","module_id":"3","is_show":"0","online":1,"menu_desc":"\\u4fee\\u6539\\u8bfe\\u7a0b\\u5217\\u8868","shortcut_allowed":"1","father_menu":"104"}', 1482390599),
(11, 'admin', 'MODIFY', 'UserGroup', '1', '{"group_role":"1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,101,103,104,105,106"}', 1482390605),
(12, 'admin', 'MODIFY', 'course', '2', '{"course_id":"2","course_name":"php","course_num":"50","course_num1":"10","course_num2":"40","course_state":"2","course_where":"2","course_like":"50"}', 1482391371),
(13, 'admin', 'ADD', 'MenuUrl', '107', '{"menu_name":"\\u8bfe\\u7a0b\\u8be6\\u60c5","menu_url":"\\/course\\/details.php","module_id":"3","is_show":"1","online":1,"menu_desc":"\\u8bfe\\u7a0b\\u8be6\\u60c5","shortcut_allowed":"1","father_menu":"0"}', 1482391502),
(14, 'admin', 'LOGIN', 'User', '1', '{"IP":"10.10.13.122"}', 1482395855),
(15, 'admin', 'DELETE', 'course', '5', '{"course_id":"5","course_name":"php","course_num":"50","course_num1":"10","course_num2":"40","course_state":"1","course_where":"1","course_like":"50"}', 1482395879),
(16, 'admin', 'ADD', 'MenuUrl', '108', '{"menu_name":"\\u8bfe\\u7a0b\\u8be6\\u60c5","menu_url":"\\/course\\/delails.php","module_id":"3","is_show":"1","online":1,"menu_desc":"\\u8bfe\\u7a0b\\u8be6\\u60c5","shortcut_allowed":"1","father_menu":"0"}', 1482399323),
(17, 'admin', 'MODIFY', 'UserGroup', '1', '{"group_role":"1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,101,103,104,105,106,107,108"}', 1482399336),
(18, 'admin', 'DELETE', 'MenuUrl', '108', '{"menu_id":"108","menu_name":"\\u8bfe\\u7a0b\\u8be6\\u60c5","menu_url":"\\/course\\/delails.php","module_id":"3","is_show":"1","online":"1","shortcut_allowed":"1","menu_desc":"\\u8bfe\\u7a0b\\u8be6\\u60c5","father_menu":"0"}', 1482399378),
(19, 'admin', 'ADD', 'MenuUrl', '109', '{"menu_name":"\\u6dfb\\u52a0\\u8bfe\\u7a0b\\u8be6\\u60c5","menu_url":"\\/course\\/delails_add.php","module_id":"3","is_show":"1","online":1,"menu_desc":"\\u6dfb\\u52a0\\u8bfe\\u7a0b\\u8be6\\u60c5","shortcut_allowed":"1","father_menu":"107"}', 1482405872),
(20, 'admin', 'MODIFY', 'UserGroup', '1', '{"group_role":"1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,101,103,104,105,106,107,109"}', 1482405943),
(21, 'admin', 'MODIFY', 'MenuUrl', '109', '{"menu_name":"\\u6dfb\\u52a0\\u8bfe\\u7a0b\\u8be6\\u60c5","menu_url":"\\/course\\/delails_add.php","is_show":"0","online":"1","menu_desc":"\\u6dfb\\u52a0\\u8bfe\\u7a0b\\u8be6\\u60c5","shortcut_allowed":"1","father_menu":"107","module_id":"3"}', 1482405964),
(22, 'admin', 'MODIFY', 'UserGroup', '1', '{"group_role":"1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,101,103,104,105,106,107,109"}', 1482406002),
(23, 'admin', 'MODIFY', 'UserGroup', '1', '{"group_role":"1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,101,103,104,105,106,107,109"}', 1482406085),
(24, 'admin', 'MODIFY', 'UserGroup', '1', '{"group_role":"1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,101,103,104,105,106,107,109"}', 1482406088),
(25, 'admin', 'MODIFY', 'UserGroup', '1', '{"group_role":"1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,101,103,104,105,106,107,109"}', 1482406092),
(26, 'admin', 'LOGOUT', 'User', '1', '', 1482406102),
(27, 'admin', 'LOGIN', 'User', '1', '{"IP":"10.10.13.122"}', 1482406114),
(28, 'admin', 'MODIFY', 'MenuUrl', '109', '{"menu_name":"\\u6dfb\\u52a0\\u8bfe\\u7a0b\\u8be6\\u60c5","menu_url":"\\/course\\/details_add.php","is_show":"0","online":"1","menu_desc":"\\u6dfb\\u52a0\\u8bfe\\u7a0b\\u8be6\\u60c5","shortcut_allowed":"1","father_menu":"107","module_id":"3"}', 1482406168),
(29, 'admin', 'LOGIN', 'User', '1', '{"IP":"172.19.145.48"}', 1482453650),
(30, 'admin', 'DELETE', 'details', '2', '{"details_course_id":"2","details_course_name":"php","details_teacher":"aaa","details_hour":"60","details_where":"305","details_time":"34","details_course_state":"2","details_summary":"aaa","details_evaluate":"aaa","course_url":"\\/js.jpg","teacher_url":"\\/js_t.jpg"}', 1482453839),
(31, 'admin', 'DELETE', 'course', '123123', '{"course_id":"123123","course_name":"\\u963f\\u8428\\u5fb7","course_num":"12","course_num1":"12","course_num2":"0","course_state":"1","course_where":"1","course_like":"12"}', 1482453861),
(32, 'admin', 'ADD', 'MenuUrl', '110', '{"menu_name":"\\u4fee\\u6539\\u8bfe\\u7a0b\\u8be6\\u60c5","menu_url":"\\/course\\/details_modify.php","module_id":"3","is_show":"0","online":1,"menu_desc":"\\u4fee\\u6539\\u8bfe\\u7a0b\\u8be6\\u60c5","shortcut_allowed":"0","father_menu":"107"}', 1482456105),
(33, 'admin', 'MODIFY', 'UserGroup', '1', '{"group_role":"1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,101,103,104,105,106,107,109,110"}', 1482456115),
(34, 'admin', 'MODIFY', 'details', '01', '{"details_teacher":"\\u9648\\u9e4f123","details_hour":"60","details_where":"www.baidu.com","details_time":"1-16\\u5468","details_summary":"js","details_evaluate":"\\u597d","course_url":"\\/js.jpg","teacher_url":"\\/js_t.jpg"}', 1482456168),
(35, 'admin', 'ADD', 'MenuUrl', '111', '{"menu_name":"\\u8bfe\\u7a0b\\u8bc4\\u4ef7","menu_url":"\\/course\\/evaluate.php","module_id":"3","is_show":"1","online":1,"menu_desc":"\\u8bfe\\u7a0b\\u8bc4\\u4ef7","shortcut_allowed":"1","father_menu":"0"}', 1482460733),
(36, 'admin', 'MODIFY', 'UserGroup', '1', '{"group_role":"1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,101,103,104,105,106,107,109,110,111"}', 1482460744),
(37, 'admin', 'DELETE', 'details', '2', '{"details_course_id":"2","details_course_name":"php","details_teacher":"\\u9648\\u9e4f","details_hour":"60","details_where":"www.baidu.com","details_time":"1-16\\u5468","details_course_state":"2","details_summary":"js","details_evaluate":"\\u597d","course_url":"\\/js.jpg","teacher_url":"\\/js_t.jpg"}', 1482461676),
(38, 'admin', 'LOGIN', 'User', '1', '{"IP":"172.19.145.48"}', 1482713182),
(39, 'admin', 'MODIFY', 'course', '01', '{"course_id":"01","course_name":"JavaScript","course_num":"50","course_num1":"0","course_num2":"50","course_state":"1","course_where":"1","course_like":"100"}', 1482715753),
(40, 'admin', 'MODIFY', 'course', '001', '{"course_id":"001","course_name":"\\u79fb\\u52a8\\u5e94\\u7528\\u5f00\\u53d11","course_num":"50","course_num1":"0","course_num2":"50","course_state":"1","course_where":"1","course_like":"5000"}', 1482716430),
(41, 'admin', 'MODIFY', 'course', '001', '{"course_id":"001","course_name":"\\u79fb\\u52a8\\u5e94\\u7528\\u5f00\\u53d11","course_num":"50","course_num1":"0","course_num2":"50","course_state":"\\u5728\\u9009","course_where":"1","course_like":"5000"}', 1482717315),
(42, 'admin', 'MODIFY', 'course', '001', '{"course_id":"001","course_name":"\\u79fb\\u52a8\\u5e94\\u7528\\u5f00\\u53d11","course_num":"50","course_num1":"0","course_num2":"50","course_state":"\\u5df2\\u6ee1","course_where":"1","course_like":"5000"}', 1482717328),
(43, 'admin', 'MODIFY', 'course', '001', '{"course_id":"001","course_name":"\\u79fb\\u52a8\\u5e94\\u7528\\u5f00\\u53d11","course_num":"50","course_num1":"0","course_num2":"50","course_state":"\\u5df2\\u6ee1","course_where":"\\u5728\\u7ebf\\u5b66\\u4e60","course_like":"5000"}', 1482718132),
(44, 'admin', 'MODIFY', 'course', '001', '{"course_id":"001","course_name":"\\u79fb\\u52a8\\u5e94\\u7528\\u5f00\\u53d11","course_num":"50","course_num1":"0","course_num2":"50","course_state":"\\u5df2\\u6ee1","course_where":"\\u5728\\u7ebf","course_like":"5000"}', 1482718234),
(45, 'admin', 'LOGIN', 'User', '1', '{"IP":"172.19.145.48"}', 1482733686),
(46, 'admin', 'DELETE', 'details', '001', '{"course_name":"\\u79fb\\u52a8\\u5e94\\u7528\\u5f00\\u53d11","course_id":"001","t_id":"1501","t_name":"\\u6f58\\u5fc5\\u8d85","course_hour":"64","course_where":"\\u5728\\u7ebf","course_time":"1-16\\u5468\\uff08\\u5468\\u4e8c3,4\\u8282\\uff09\\uff0c\\uff08\\u5468\\u4e94\\uff0c7,8\\uff09","course_open":"2016-12-15","course_state":"\\u5df2\\u6ee1","course_summary":"\\u6253\\u4e0d\\u5b8c\\u7684\\u4ee3\\u7801\\uff01","course_star":"1","course_url":"images\\/CourseImages\\/1.jpg","t_url":"images\\/TeacherImages\\/1.jpg"}', 1482735473),
(47, 'admin', 'MODIFY', 'details', '001', '{"t_id":null,"course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-01","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482740598),
(48, 'admin', 'MODIFY', 'details', '001', '{"t_id":null,"course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-02","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482740730),
(49, 'admin', 'MODIFY', 'details', '001', '{"t_id":null,"course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-01","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482740800),
(50, 'admin', 'MODIFY', 'details', '001', '{"t_id":null,"course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-02","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482741031),
(51, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-02","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482741200),
(52, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-02","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482741342),
(53, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-02","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482741359),
(54, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-02","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482741448),
(55, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-02","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482741512),
(56, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-02","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482741540),
(57, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-01","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482741567),
(58, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-01","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482741602),
(59, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-01","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482741652),
(60, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-01","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482741734),
(61, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-01","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482741780),
(62, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-01","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482742335),
(63, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-01","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482742351),
(64, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-01","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482742538),
(65, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-01","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482742713),
(66, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1501","course_url":"images\\/CourseImages\\/js.jpg","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"java\\u521d\\u5b66\\u8005","course_summary":"Java","course_star":"3","course_open":"2016-12-01","course_hour":"60","t_url":"images\\/TeacherImages\\/js_t.jpg"}', 1482742933),
(67, 'admin', 'LOGIN', 'User', '1', '{"IP":"192.168.199.122"}', 1482822091),
(68, 'admin', 'LOGIN', 'User', '1', '{"IP":"192.168.199.122"}', 1482823027),
(69, 'admin', 'ADD', 'MenuUrl', '112', '{"menu_name":"\\u83b7\\u53d6\\u8bfe\\u7a0b\\u540d\\u79f0","menu_url":"\\/course\\/aa.php","module_id":"3","is_show":"0","online":1,"menu_desc":"","shortcut_allowed":"1","father_menu":"0"}', 1482824081),
(70, 'admin', 'MODIFY', 'UserGroup', '1', '{"group_role":"1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,101,103,104,105,106,107,109,110,111,112"}', 1482824095),
(71, 'admin', 'ADD', 'MenuUrl', '113', '{"menu_name":"\\u83b7\\u53d6\\u8001\\u5e08\\u540d\\u79f0","menu_url":"\\/course\\/bb.php","module_id":"3","is_show":"0","online":1,"menu_desc":"","shortcut_allowed":"1","father_menu":"0"}', 1482825238),
(72, 'admin', 'MODIFY', 'UserGroup', '1', '{"group_role":"1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,101,103,104,105,106,107,109,110,111,112,113"}', 1482825244),
(73, 'admin', 'MODIFY', 'details', '001', '{"t_id":"1503","course_url":"img","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"\\u521d\\u5b66\\u8005","course_summary":"11","course_star":"1","course_open":"2016-12-01","course_hour":"60","t_url":"img"}', 1482825484),
(74, 'admin', 'MODIFY', 'details', '001', '{"course.t_id":"1503","course_url":"img","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"\\u521d\\u5b66\\u8005","course_summary":"11","course_star":"1","course_open":"2016-12-01","course_hour":"60","t_url":"img"}', 1482826366),
(75, 'admin', 'MODIFY', 'details', '001', '{"course.t_id":"1503","course_url":"img","course_place":"\\u56fe\\u6587305","course_time":"\\u5468\\u4e0034\\u8282","people":"\\u521d\\u5b66\\u8005","course_summary":"11","course_star":"1","course_open":"2016-12-01","course_hour":"60","t_url":"img"}', 1482826370),
(76, 'admin', 'MODIFY', 'course', '001', '{"course_id":"001","course_name":"Java","course_num":"50","course_num1":"50","course_num2":"0","course_state":"\\u5df2\\u6ee1","course_where":"\\u6559\\u5ba4","course_like":"2"}', 1482827534);

-- --------------------------------------------------------

--
-- 表的结构 `osa_system`
--

CREATE TABLE `osa_system` (
  `key_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `key_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='系统配置表';

--
-- 转存表中的数据 `osa_system`
--

INSERT INTO `osa_system` (`key_name`, `key_value`) VALUES
('timezone', '"Asia/Shanghai"');

-- --------------------------------------------------------

--
-- 表的结构 `osa_user`
--

CREATE TABLE `osa_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `real_name` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_desc` varchar(255) DEFAULT NULL,
  `login_time` int(11) DEFAULT NULL COMMENT '登录时间',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `login_ip` varchar(32) DEFAULT NULL,
  `user_group` int(11) NOT NULL,
  `template` varchar(32) NOT NULL DEFAULT 'default' COMMENT '主题模板',
  `shortcuts` text COMMENT '快捷菜单',
  `show_quicknote` int(11) NOT NULL DEFAULT '1' COMMENT '是否显示quicknote'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='后台用户';

--
-- 转存表中的数据 `osa_user`
--

INSERT INTO `osa_user` (`user_id`, `user_name`, `password`, `real_name`, `mobile`, `email`, `user_desc`, `login_time`, `status`, `login_ip`, `user_group`, `template`, `shortcuts`, `show_quicknote`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'SomewhereYu', '13800138001', 'admin@osadmin.org', '初始的超级管理员!', 1482823027, 1, '192.168.199.122', 1, 'wintertide', '2,7,10,11,13,14,18,21,24,107', 0),
(26, 'demo', 'e10adc3949ba59abbe56e057f20f883e', 'SomewhereYu', '15812345678', 'yuwenqi@osadmin.org', '默认用户组成员', 1371605873, 1, '127.0.0.1', 2, 'schoolpainting', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `osa_user_group`
--

CREATE TABLE `osa_user_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(32) DEFAULT NULL,
  `group_role` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '初始权限为1,5,17,18,22,23,24,25',
  `owner_id` int(11) DEFAULT NULL COMMENT '创建人ID',
  `group_desc` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='账号组';

--
-- 转存表中的数据 `osa_user_group`
--

INSERT INTO `osa_user_group` (`group_id`, `group_name`, `group_role`, `owner_id`, `group_desc`) VALUES
(1, '超级管理员组', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,101,103,104,105,106,107,109,110,111,112,113', 1, '万能的不是神，是程序员'),
(2, '默认账号组', '1,5,17,18,20,22,23,24,25,101', 1, '默认账号组');

-- --------------------------------------------------------

--
-- 表的结构 `sample`
--

CREATE TABLE `sample` (
  `sample_id` int(11) NOT NULL,
  `sample_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `sample`
--

INSERT INTO `sample` (`sample_id`, `sample_content`) VALUES
(1, '这是一个样例');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `osa_menu_url`
--
ALTER TABLE `osa_menu_url`
  ADD PRIMARY KEY (`menu_id`),
  ADD UNIQUE KEY `menu_url` (`menu_url`);

--
-- Indexes for table `osa_module`
--
ALTER TABLE `osa_module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `osa_quick_note`
--
ALTER TABLE `osa_quick_note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `osa_sys_log`
--
ALTER TABLE `osa_sys_log`
  ADD PRIMARY KEY (`op_id`),
  ADD KEY `op_time` (`op_time`),
  ADD KEY `class_name` (`class_name`);

--
-- Indexes for table `osa_system`
--
ALTER TABLE `osa_system`
  ADD PRIMARY KEY (`key_name`);

--
-- Indexes for table `osa_user`
--
ALTER TABLE `osa_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `osa_user_group`
--
ALTER TABLE `osa_user_group`
  ADD PRIMARY KEY (`group_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `osa_menu_url`
--
ALTER TABLE `osa_menu_url`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- 使用表AUTO_INCREMENT `osa_module`
--
ALTER TABLE `osa_module`
  MODIFY `module_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `osa_quick_note`
--
ALTER TABLE `osa_quick_note`
  MODIFY `note_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'note_id', AUTO_INCREMENT=31;
--
-- 使用表AUTO_INCREMENT `osa_sys_log`
--
ALTER TABLE `osa_sys_log`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- 使用表AUTO_INCREMENT `osa_user`
--
ALTER TABLE `osa_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- 使用表AUTO_INCREMENT `osa_user_group`
--
ALTER TABLE `osa_user_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
