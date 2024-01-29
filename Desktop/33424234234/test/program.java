import java.util.concurrent.TimeUnit;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.HttpClients;
import com.fasterxml.jackson.databind.ObjectMapper;

public class CrptApi {

    private final int requestLimit;
    private final long intervalMillis;
    private long lastRequestTime;
    private int requestCount;

    public CrptApi(TimeUnit timeUnit, int requestLimit) {
        this.requestLimit = requestLimit;
        this.intervalMillis = timeUnit.toMillis(1);
        this.lastRequestTime = System.currentTimeMillis();
        this.requestCount = 0;
    }

    public synchronized void createDocument(Document document, String signature) {
        checkRateLimit();

        HttpClient httpClient = HttpClients.createDefault();
        HttpPost httpPost = new HttpPost("https://ismp.crpt.ru/api/v3/1k/documents/create");

        try {
    
            ObjectMapper objectMapper = new ObjectMapper();
            String requestBody = objectMapper.writeValueAsString(document);

            StringEntity entity = new StringEntity(requestBody);
            httpPost.setEntity(entity);

            
            httpPost.addHeader("Signature", signature);

       
            HttpResponse response = httpClient.execute(httpPost);

        

           
            requestCount++;
            lastRequestTime = System.currentTimeMillis();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void checkRateLimit() {
        long currentTime = System.currentTimeMillis();
        long elapsedTime = currentTime - lastRequestTime;

        if (elapsedTime < intervalMillis) {
            if (requestCount >= requestLimit) {
                long sleepTime = intervalMillis - elapsedTime;
                try {
                    Thread.sleep(sleepTime);
                } catch (InterruptedException e) {
                    Thread.currentThread().interrupt();
                }
            }
        } else {
            requestCount = 0;
            lastRequestTime = currentTime;
        }
    }

    
    public static class Document {
       
    }
}