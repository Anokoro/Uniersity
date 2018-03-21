create table service_center.Database_log(
    ts      timestamp       not null,
    log     varchar(500)
);

# 工资概况avg/max/min   higher_than_avg/lower_than_avg //统计比平均工资高/低的人数
create or REPLACE VIEW avg_salary as
    select avg(salary) as avg_salary from salary;
CREATE OR REPLACE VIEW salary_summary AS
    select  cast(avg(a.salary) as DECIMAL(8,2)) avg_salary,max(a.salary) max_salary,min(a.salary) min_salary,
            sum((case when a.salary>b.avg_salary then 1 else 0 end)) higher_than_avg,
            sum((case when a.salary<b.avg_salary then 1 else 0 end)) lower_than_avg
    from salary a,avg_salary b;

# 服务项目价格avg/max/min
CREATE OR REPLACE VIEW service_price_sumary AS
    SELECT avg(price) as average,max(price) as maximum,min(price) as minimum FROM service;

# 工资总览，查看不同工资的人数分布，每一个工资有多少人
CREATE OR REPLACE VIEW salary_statistics AS
    SELECT salary,count(salary.AID) as nums
    FROM salary GROUP BY  salary.salary;
# 查看各个服务项目的价格统计，每一个价格有多少个项目
CREATE OR REPLACE VIEW service_price_statistics AS
    SELECT price,count(service.SID) as nums
    FROM service GROUP BY  service.price;


# 每个服务人员已处理的订单数量
CREATE OR REPLACE VIEW records_num_of_per_assist AS
    SELECT  assistInfo.name,count(records.RID) as records_num FROM records
        LEFT JOIN assistInfo ON records.AID = assistInfo.AID
    GROUP BY records.AID;
# 每个服务人员正被预约的订单数量
CREATE OR REPLACE VIEW orders_num_of_per_assist AS
    SELECT  assistInfo.name,count(orders.OID) as orders_num FROM orders
        LEFT JOIN assistInfo ON orders.AID = assistInfo.AID
    GROUP BY orders.AID;
# 每个用户的历史订单数量
CREATE OR REPLACE VIEW records_num_of_per_user AS
    SELECT  userInfo.name,count(records.RID) as records_num FROM records
        LEFT JOIN userInfo ON records.AID = userInfo.UID
    GROUP BY records.AID;
# 每个用户的预约的订单数量
CREATE OR REPLACE VIEW orders_num_of_per_user AS
    SELECT  userInfo.name,count(orders.OID) as orders_num FROM orders
        LEFT JOIN userInfo ON orders.AID = userInfo.UID
    GROUP BY orders.AID;

# 3个统计各类人员数量的视图
CREATE OR REPLACE VIEW everyRoleNum AS
    select role,count(*)as num from accounts GROUP BY role;