#Training Laravel 9 _ DIMAGESHARE 
composer require livewire/livewire

###SERVICE LARAVEL
1. Dependency injection là gì  - là một nguyên lý thiết kế và viết code. 
    -dependency injection (DI) chỉ đơn giản là cung cấp cho một object những object nó phụ thuộc (dependencies) từ bên ngoài truyền vào
    mà không phải khởi tạo từ trong hàm dựng. Điều này giúp ứng dụng linh động hơn và dễ test hơn.
2. Inversion of Control là gì ? (deeply nested class dependencies)
    -Đây là một design partern nằm trong nguyên lý SOLID, nó được tạo ra để tuân thủ theo nguyên lý Denpendency Inversion. 
    -Có rất nhiều cách để thực hiện partern này, Dependency ịnection là một trong số những cách đó.
3. Repository Design Pattern  
    -Hiểu một cách đơn giản đó là bạn sẽ tạo ra một tầng Repository ở giữa Controller và Model (ORM Layer), với nhiệm vụ là thực hiện các business logic xử lý DB, từ đó tránh được việc viết Business Logic ở cả Controller lẫn Model, tạo ra những hàm có thể được sử dụng lại ở nhiều nơi khác nhau.
    -Với Repository Pattern, Controller sẽ không còn làm việc trực tiếp với Model nữa, nó cần xử lý liên quan đến DB, nó sẽ làm việc với Repository.
3. Service Container
    -Là một nơi quản lý class dependency và thực hiện dependency injection.
4. bind : để chỉ việc đăng ký một class hay interface với Container
5. resolve: để lấy ra instance từ Container
6.  
    -Một trong những điểm yếu của dependency injection đó là người lập trình sẽ gặp nhiều khó khăn khi các dependency của họ phụ thuộc tầng tầng lớp lớp vào nhau.Bạn sẽ phải chuẩn bị hết những dependency đó. 
    -Tuy nhiên với Service Container thì mọi thứ dễ chịu hơn nhiều. Nếu dependency của class của bạn cần những dependency khác, nó sẽ có khả năng tự động inject hết cho bạn.
7. Singleton binding
    -Như tên gọi của nó thì instance (thể hiện) sẽ chỉ được resolve (lấy ra) một lần, những lần gọi tiếp theo sẽ không tạo ra instance mới mà chỉ trả về instance đã được resolve từ trước.
    
        app()->singleton('now', function() {return time();});
        app('now') === app('now'); // true

8. Instance binding
    -Bạn có một instance và bạn bind nó vào Service Container. Mỗi lần lấy ra bạn sẽ nhận lại được instance đó.
        $now = time();
        app()->instance('now', $now);
        $now === app('now'); // true

9. Interface binding
    -Như đã trình bày ở trên thì bạn có thể bind một Class dưới một cái tên bất kỳ. 
    -Và điều gì sẽ xảy ra nến cái tên đó là một Interface. Vâng nếu bạn bind một Interface với một Implementation của nó thì bạn sẽ có thể type-hint được Interface đó

10. Thắc mắc
    -Nhưng bạn có thắc mắc là tại sao lại cần binding một Interface với một Implementation để làm gì không?
    -Tại sao lại cần phải type-hint Interface làm gì, sao ta không dùng thẳng tên class là implementation của Interface đó?
    ->Câu trả lời là với việc type-hint Interface thì ta có thể có được sự linh hoạt trong việc thay đổi các Implementation mà mình muốn, hay sử dụng một Implementation mà mình viết thay vì cái mặc địch của Laravel mà không gây ảnh hưởng gì đến Framework hay service của mình. 
    ->Đó là nguyên tắc "program to an interface, not an implementation"!

11. Contextual Binding
    -Giúp bạn giải quyết được vấn đề sử dụng nhiều Implementation trong service của mình.
    -Chẳng hạn như bạn có đến 2, 3 class là implementation của một Interface. 
    -Tuy nhiên trong một trường hợp bạn cần inject implementation này và trong trường hợp khác bạn lại cần implementation khác, khi đó bạn sẽ cần đến Contextual Binding.
    -Ngoài ra bạn còn có thể sử dụng tag để gom một lúc nhiều thứ vào làm một, để lúc resolve được dễ dàng hơn.

12. Service Provider 
    -Là chìa khoá cho quá trình bootstrapping một Laravel Application.
    -Hãy tưởng tượng application của bạn như một cái Container, và khi khởi chạy, nó sẽ tiến hành đưa các service cần thiết vào trong container đó, rồi những gì bạn cần làm là lấy ra những service cần thiết vào thời điểm cần thiết từ container để xử lý một request gửi đến.

13. Repository : thường là nơi các bạn viết các câu truy vấn database.
    -Trong một ứng dụng, ta thường phải xử lý dữ liệu trước khi lưu vào database hoặc trước khi trả về. 
    -Thông thường ta viết luôn các đoạn xử lý đó ở trong controller dẫn đến tình trạng controller bị phình to ra và rất khó đọc nếu ta có quá nhiều đoạn xử lý logic đó. 
    -Ta có một giải pháp đó là xử dụng Service Layer.