#药材设施栽培远程灌溉控制系统安卓手机客户端软件设计
>2016/05/28

##1.Comm端主要流程	
1. 串口接收来自zigbee传感网络的数据，
2. 使用eclipse编写名为comm的java project.
	- eclipse环境搭建，下载jdk并安装
	- 下载java第三方串口通信类库，并加入jdk中
	- Comm 工程文件介绍：
		- Data.java：数据的javabean类，用于存储收集到的数据，创建bean类方便使用管理。
		- DSerialPost.java：串口通信部分流程编写，文件注释已详细介绍。
		- JDBCUtils.java：JDBC工具类，内部包含本次设计用到的增删工作方法。
		- Main.java:主要运行main程序。
		- ResolveData.java：用于数据处理的类。
		- Test.java：用于测试程序的类。
	> 在程序运行前需要将comm.jar包与mysql-connector-java-5.1.7-bin.jar的包导入并build path，前者为串口通信类库，后者为JDBC类库。
##2.数据库即映射
1. 安装MySQL数据库，并使用navicat数据库可视化工具，在内部创建名为data的数据库，以及名同样为data的表，依照从左至右的顺序，创建id，soilTemperature,soilHuidity,airTemperature,airHumidity,currentTime五列数据，用于对应存储数据。
2. 使用php编写index.php，用于连接并读取数据库的网页，并使用apache环境的80端口对其进行再网页端的显示，连接即为http:localhost:80
3. 下载并安装nat123，创建来自80端口的本机localhost的映射。此时即可使用外部网络查看nat123映射出的网址，以观测数据库。
##3.Andorid客户端的开发
>android客户端的开发本次设计使用的是Android studio2.1.1版本。源码文件为Temp-Humi。

1. 使用android studio打开该工程文件，主要结构：
	- charview：折线图部分的自定义控件文件，主要使用canvas类进行折线图的描绘。
	- Data：与eclipse端相同，本文件为数据的Bean类，以及数据处理的工具类，使用HttpURLConnection抓取nat123映射的网页上的数据，并使用正则匹配，存入匹配的数据与data类。
	- sql：数据库OpenHelper类，MySQLiteOpenHelper为数据存储时使用的帮助类，new部分为注册时使用的帮助类
	- LoginActivity：登录主页
	- MainActivity：数据显示的主页
	- MyAdapter：主页中用于数据显示的Listview部分所需要的适配器
	- RecordActivity：记录查询页面，该页面为dialog形式显示
	- Signin：注册主页
2. 本设计适配4.4至6.0版本的android手机，使用android手机连接，运行工程，注册登录，进入主页刷新数据，即可实施观测到eclipse端输入MySQL数据库中的数据。

  

